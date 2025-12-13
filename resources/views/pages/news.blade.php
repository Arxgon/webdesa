@extends('layouts.app')

@section('content')

<!-- HERO HEADER -->
<section class="bg-slate-50 py-16" data-aos="fade-down">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-3">
            Berita & Artikel Desa
        </h1>
        <p class="text-slate-600 max-w-2xl mx-auto">
            Informasi terkini seputar kegiatan, pembangunan, dan kehidupan masyarakat Desa Liang Anggang
        </p>
    </div>
</section>

<!-- CONTENT -->
<section class="py-14 bg-white">
    <div class="container mx-auto px-4">

        <div class="grid lg:grid-cols-4 gap-10">

            <!-- ================= MAIN CONTENT ================= -->
            <div class="lg:col-span-3">

                <!-- FILTER -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">
                            Artikel Terbaru
                        </h2>
                        <p class="text-sm text-slate-500">
                            Total {{ count($news) }} artikel
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <input type="text"
                            placeholder="Cari judul berita..."
                            class="w-full md:w-64 px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-orange-200">

                        <select
                            class="px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-orange-200">
                            <option>Semua Kategori</option>
                            <option>Pemerintahan</option>
                            <option>Pembangunan</option>
                            <option>Kegiatan Warga</option>
                            <option>UMKM Desa</option>
                        </select>
                    </div>
                </div>

                <!-- NEWS LIST -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($news as $n)
                    <article data-aos="fade-up"
                        class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition duration-300">

                        <!-- IMAGE -->
                        <div class="overflow-hidden">
                            <img src="{{ $n['img'] }}"
                                alt="{{ $n['title'] }}"
                                class="h-48 w-full object-cover hover:scale-105 transition duration-500">
                        </div>

                        <!-- CONTENT -->
                        <div class="p-5 flex flex-col h-full">

                            <span
                                class="text-xs text-orange-600 font-medium mb-2">
                                {{ $n['category'] ?? 'Berita Desa' }}
                            </span>

                            <h3 class="font-semibold text-slate-900 text-lg leading-snug mb-2">
                                {{ $n['title'] }}
                            </h3>

                            <p class="text-sm text-slate-600 mb-4 line-clamp-3">
                                {{ $n['desc'] }}
                            </p>

                            <div class="mt-auto flex items-center justify-between text-xs text-slate-500">
                                <span>
                                    {{ $n['date'] ?? 'Oktober 2025' }}
                                </span>

                                <a href="{{ route('news.show', $n['slug'] ?? '#') }}"
                                    class="text-orange-600 font-medium hover:underline">
                                    Baca →
                                </a>
                            </div>
                        </div>
                    </article>
                    @endforeach

                </div>

                <!-- PAGINATION -->
                <div class="mt-12 flex justify-center gap-2 text-sm">
                    <button
                        class="px-4 py-2 border rounded-lg hover:bg-slate-100">
                        Prev
                    </button>
                    <button
                        class="px-4 py-2 border rounded-lg bg-orange-600 text-white">
                        1
                    </button>
                    <button
                        class="px-4 py-2 border rounded-lg hover:bg-slate-100">
                        2
                    </button>
                    <button
                        class="px-4 py-2 border rounded-lg hover:bg-slate-100">
                        Next
                    </button>
                </div>
            </div>

            <!-- ================= SIDEBAR ================= -->
            <aside class="space-y-8">

                <!-- POPULAR NEWS -->
                <div data-aos="fade-left"
                    class="bg-slate-50 rounded-xl p-5">
                    <h3 class="font-semibold text-slate-900 mb-4">
                        Berita Populer
                    </h3>

                    <ul class="space-y-4">
                        @foreach(array_slice($news, 0, 4) as $p)
                        <li class="flex gap-3">
                            <img src="{{ $p['img'] }}"
                                class="w-16 h-16 rounded-lg object-cover">

                            <div>
                                <a href="#"
                                    class="text-sm font-medium text-slate-800 hover:text-orange-600">
                                    {{ $p['title'] }}
                                </a>
                                <p class="text-xs text-slate-500">
                                    {{ $p['date'] ?? '2025' }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- CATEGORY -->
                <div data-aos="fade-left"
                    class="bg-slate-50 rounded-xl p-5">
                    <h3 class="font-semibold text-slate-900 mb-4">
                        Kategori
                    </h3>

                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-orange-600">Pemerintahan</a></li>
                        <li><a href="#" class="hover:text-orange-600">Pembangunan</a></li>
                        <li><a href="#" class="hover:text-orange-600">Kegiatan Warga</a></li>
                        <li><a href="#" class="hover:text-orange-600">UMKM Desa</a></li>
                    </ul>
                </div>

            </aside>
        </div>
    </div>
</section>

@endsection
