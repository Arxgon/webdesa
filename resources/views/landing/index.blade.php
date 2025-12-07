@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section id="hero" class="pt-28 bg-[#0A332C] text-white pb-20">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">

        <div data-aos="zoom-in">
            <h1 class="hero-title text-4xl md:text-5xl font-extrabold leading-tight">
                {{ __('landing.hero_title') }}</h1>
            <p class="hero-subtitle mt-4 text-gray-300 max-w-lg">
                {{ __('landing.hero_subtitle') }}
            </p>
        </div>

        <img src="{{ Vite::asset('resources/images/hero.jpg') }}" class="hero-img rounded-lg shadow-lg w-full" />
    </div>
</section>

{{-- NEWS SECTION --}}
<section id="news" class="bg-[#f0f0f0] py-32" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-2">{{ __('landing.hero_news') }}</h2>
        <p class="text-gray-500 mb-8">Artikel dan berita terbaru</p>


        <div class="grid md:grid-cols-4 gap-6">
            @foreach($news as $n)
            <div data-aos="fade-up" class="shadow rounded-lg overflow-hidden bg-white hover:shadow-lg transition">
                <img src="{{ $n['img'] }}" class="h-40 w-full object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold">{{ $n['title'] }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ $n['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DATA DESA SECTION --}}
<section id="data" class="py-32" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Data Desa</h2>

        <div class="grid md:grid-cols-2 gap-8">

            {{-- LEFT SIDE – 4 DATA CARDS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- Jumlah Penduduk --}}
                <div class="rounded-lg shadow bg-white p-6">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-desa-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 20a6 6 0 00-12 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold mb-2">Jumlah Penduduk</h2>
                    <p class="text-4xl font-bold text-desa-600">4.820</p>
                    <p class="text-sm text-gray-500">Data per Oktober 2025</p>
                </div>

                {{-- Kepala Keluarga --}}
                <div class="rounded-lg shadow bg-white p-6">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-desa-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l9-9 9 9M4.5 10.5V21h15V10.5" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold mb-2">Kepala Keluarga</h2>
                    <p class="text-4xl font-bold text-desa-600">1.243</p>
                    <p class="text-sm text-gray-500">Data terupdate</p>
                </div>

                {{-- Luas Wilayah --}}
                <div class="rounded-lg shadow bg-white p-6">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-desa-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75l6-3 6 3 6-3v12l-6 3-6-3-6 3v-12z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold mb-2">Luas Wilayah</h2>
                    <p class="text-4xl font-bold text-desa-600">12,3 km²</p>
                    <p class="text-sm text-gray-500">Meliputi 4 dusun & 8 RT</p>
                </div>

                {{-- Data Lainnya --}}
                <div class="rounded-lg shadow bg-white p-6">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 text-desa-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M9 9h6m-6 4h4m-4 4h6" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold mb-2">Data Lainnya</h2>
                    <p class="text-4xl font-bold text-desa-600">–</p>
                    <p class="text-sm text-gray-500">Informasi tambahan desa</p>
                </div>

            </div>

            {{-- RIGHT SIDE – GOOGLE MAPS --}}
            <div class="rounded-lg shadow bg-white overflow-hidden">
                <h2 class="text-lg font-semibold p-4 pb-2">Lokasi Desa</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.560814677484!2d114.70990597497083!3d-3.3454190966420616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4226c4c32732d%3A0xc0cc721e868ba9dd!2sLiang%20Anggang%2C%20Kec.%20Bati-Bati%2C%20Kabupaten%20Tanah%20Laut%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1736162800000!5m2!1sid!2sid"
                    class="w-full h-96 border-0" loading="lazy">
                </iframe>
            </div>

        </div>
    </div>
</section>

{{-- PHOTOS SECTION --}}
<section id="photos" class="bg-[#0A332C] text-white py-32" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Galeri</h2>
        <p class="text-gray-300 mb-8 max-w-xl">Foto-foto Desa Liang Anggang</p>


        <div class="grid md:grid-cols-4 gap-6">
            @foreach($photos as $p)
            <div class="bg-white text-gray-800 rounded-lg shadow overflow-hidden">
                <img src="{{ $p['img'] }}" class="h-80 w-full object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold">{{ $p['title'] }}</h3>
                    <!-- <p class="text-orange-600 font-bold">{{ $p['desc'] }}</p> -->
                </div>
            </div>
            @endforeach
        </div>


        <a href="#"
            class="mt-8 inline-block px-6 py-3 bg-orange-500 hover:bg-orange-600 rounded-md text-sm font-semibold">Lihat
            Lebih Banyak Foto →</a>
    </div>
</section>

{{-- DATA DESA SECTION --}}
<section id="data" class="py-32" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Data Desa</h2>

        <div class="grid md:grid-cols-2 gap-8">


        </div>
    </div>
</section>

@endsection