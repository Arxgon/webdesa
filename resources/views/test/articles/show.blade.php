@extends('test.layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', $post->title)

@section('meta')
<meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160) }}">
@if($post->canonical_url)
<link rel="canonical" href="{{ $post->canonical_url }}">
@endif
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160) }}">
<meta property="og:url" content="{{ url()->current() }}">
@if($post->cover_image_url)
<meta property="og:image" content="{{ asset('storage/'.$post->cover_image_url) }}">
@endif
@endsection

@section('breadcrumbs')
<nav class="text-sm text-gray-600">
    <a href="{{ route('articles.index') }}" class="hover:underline">Beranda</a>
    <span class="mx-2">/</span>
    <a href="{{ route('articles.list') }}" class="hover:underline">Artikel</a>
    <span class="mx-2">/</span>
    <span class="text-gray-800">{{ $post->title }}</span>
</nav>
@endsection

@section('content')
<article>
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <p class="text-sm text-gray-500">
        {{ optional($post->published_at)->translatedFormat('d F Y') ?? '-' }} - oleh {{ $post->author->name ?? 'Anonim' }}
    </p>

    <div class="prose max-w-none mt-6">{!! $post->content !!}</div>

    <div class="mt-8 flex flex-wrap text-sm gap-4">
        @if($prev)
        <a href="{{ route('articles.show', $prev->slug) }}" class="text-blue-600 hover:underline">&larr; {{ $prev->title }}</a>
        @endif
        @if($next)
        <a href="{{ route('articles.show', $next->slug) }}" class="text-blue-600 hover:underline">{{ $next->title }} &rarr;</a>
        @endif
    </div>

    <section class="mt-10">
        <h2 class="font-semibold mb-3">Komentar</h2>

        @forelse($post->comments as $comment)
        <div class="border-b py-3">
            <p class="text-sm text-gray-600">
                {{ $comment->author_name ?? ($comment->author->name ?? 'Anonim') }}
                - {{ $comment->created_at->diffForHumans() }}
            </p>
            <p>{{ $comment->content }}</p>
        </div>
        @empty
        <p class="text-gray-600">Belum ada komentar.</p>
        @endforelse

        <form action="{{ route('articles.comment.store', $post->slug) }}" method="POST" class="mt-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <input type="text" name="author_name" class="border px-3 py-2" placeholder="Nama"
                    value="{{ old('author_name') }}" required>
                <input type="email" name="author_email" class="border px-3 py-2" placeholder="Email"
                    value="{{ old('author_email') }}" required>
            </div>
            <textarea name="content" class="border px-3 py-2 w-full mt-3" rows="4" placeholder="Tulis komentar..."
                required>{{ old('content') }}</textarea>
            <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
        </form>
    </section>
</article>
@endsection
