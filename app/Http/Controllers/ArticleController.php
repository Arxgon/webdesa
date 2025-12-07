<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Listing artikel terbit dengan pagination & fitur pencarian ringan.
     */
    public function index(Request $request)
    {
        $query = Post::query()
            ->published() // scope: status = published dan published_at != null
            ->with(['author:id,name,username', 'categories:id,name,slug', 'tags:id,name,slug'])
            ->latest('published_at');

        // Featured dulu (opsional)
        if ($request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        // Pencarian kata kunci sederhana
        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(9)->withQueryString();

        return view('test.articles.index', [
            'posts' => $posts,
            'search' => $search,
            'featuredOnly' => $request->boolean('featured'),
        ]);
    }

    /**
     * Detail artikel + komentar terpublikasi/approved.
     */
    public function show(string $slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->published()
            ->with([
                'author:id,name,username',
                'categories:id,name,slug',
                'tags:id,name,slug',
                // Komentar hanya approved, urutan terbaru
                'comments' => function ($q) {
                    $q->where('status', 'approved')
                      ->with(['author:id,name']) // jika ada user penulis komentar
                      ->latest();
                },
            ])
            ->firstOrFail();

        // Next & Prev (opsional)
        $next = Post::query()->published()
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->select('id', 'title', 'slug', 'published_at')
            ->first();

        $prev = Post::query()->published()
            ->where('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->select('id', 'title', 'slug', 'published_at')
            ->first();

        return view('test.articles.show', compact('post', 'next', 'prev'));
    }

    /**
     * Filter berdasarkan kategori.
     */
    public function byCategory(string $slug)
    {
        $category = Category::query()->where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->published()
            ->with(['author:id,name,username', 'categories:id,name,slug', 'tags:id,name,slug'])
            ->latest('published_at')
            ->paginate(9);

        return view('test.articles.category', compact('category', 'posts'));
    }

    /**
     * Filter berdasarkan tag.
     */
    public function byTag(string $slug)
    {
        $tag = Tag::query()->where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->published()
            ->with(['author:id,name,username', 'categories:id,name,slug', 'tags:id,name,slug'])
            ->latest('published_at')
            ->paginate(9);

        return view('test.articles.tag', compact('tag', 'posts'));
    }

    /**
     * Halaman pencarian (GET /cari?q=...)
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        return $this->index($request);
    }

    /**
     * Menyimpan komentar publik pada artikel (moderasi pending).
     */
    public function storeComment(Request $request, string $slug)
    {
        $post = Post::query()->where('slug', $slug)->published()->firstOrFail();

        $validated = $request->validate([
            'author_name'  => ['required', 'string', 'max:191'],
            'author_email' => ['required', 'email', 'max:191'],
            'content'      => ['required', 'string', 'max:2000'],
            'parent_id'    => ['nullable', 'integer', 'exists:comments,id'],
        ]);

        DB::transaction(function () use ($post, $validated) {
            // Jika user login, simpan user_id
            $userId = auth()->id();

            Comment::create([
                'commentable_type' => Post::class,
                'commentable_id'   => $post->id,
                'user_id'          => $userId,
                'author_name'      => $validated['author_name'],
                'author_email'     => $validated['author_email'],
                'content'          => $validated['content'],
                'status'           => 'pending',       // moderasi dulu
                'parent_id'        => $validated['parent_id'] ?? null,
            ]);
        });

        return redirect()
            ->route('articles.show', $post->slug)
            ->with('status', 'Komentar berhasil dikirim dan akan ditinjau.');
    }
}
