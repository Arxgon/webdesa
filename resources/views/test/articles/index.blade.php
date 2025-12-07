@extends('test.layouts.app')

@section('title', 'Artikel Desa')

@section('content')
<section class="container mx-auto px-4 py-8">
    <form method="GET" action="{{ route('articles.search') }}" class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center gap-3">
            <input type="text" name="q" value="{{ old('q', $search) }}" placeholder="Cari artikel..."
                class="border px-3 py-2 w-full md:w-1/2">
            @if(!empty($featuredOnly))
            <input type="hidden" name="featured" value="1">
            @endif
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Cari</button>
            <a href="{{ route('articles.index') }}" class="text-sm text-gray-600">Reset</a>
        </div>
    </form>

    @include('test.articles._cards', ['posts' => $posts])

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</section>
@endsection
