@extends('layouts.app')
@section('title', "Tag: {$tag->name}")

@section('content')
<section class="container mx-auto px-4 py-8">
    <h1 class="text-xl font-bold mb-4">Tag: {{ $tag->name }}</h1>
    @include('test.articles._cards', ['posts' => $posts])
    {{ $posts->links() }}
</section>
@endsection
