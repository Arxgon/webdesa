@php use Illuminate\Support\Str; @endphp

@if($posts->count())
<div class="grid md:grid-cols-3 gap-6">
    @foreach($posts as $post)
    <article class="border rounded p-4">
        <h2 class="font-semibold text-lg">
            <a href="{{ route('articles.show', $post->slug) }}" class="hover:underline">
                {{ $post->title }}
            </a>
        </h2>
        <p class="text-sm text-gray-500">
            {{ optional($post->published_at)->translatedFormat('d F Y') ?? '-' }} - oleh {{ $post->author->name ?? 'Anonim' }}
        </p>
        @if($post->excerpt)
        <p class="mt-2 text-gray-700">{{ Str::limit(strip_tags($post->excerpt), 140) }}</p>
        @endif
        <div class="mt-3 text-xs">
            @forelse($post->categories as $cat)
            <a href="{{ route('articles.category', $cat->slug) }}"
                class="inline-block mr-1 px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">
                {{ $cat->name }}
            </a>
            @empty
            <span class="text-gray-400">Tanpa kategori</span>
            @endforelse
        </div>
    </article>
    @endforeach
</div>
@else
<p class="text-gray-600">Belum ada artikel.</p>
@endif
