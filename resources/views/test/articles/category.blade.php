@extends('test.layouts.app')
@section('title', "Kategori: {$category->name}")

@section('content')
<section class="container mx-auto px-4 py-8">
    <h1 class="text-xl font-bold mb-4">Kategori: {{ $category->name }}</h1>
    @include('test.articles._cards', ['posts' => $posts])
    {{ $posts->links() }}
</section>
@endsection
