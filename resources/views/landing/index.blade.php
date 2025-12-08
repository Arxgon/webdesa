@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section id="hero" class="pt-20 bg-[#0A332C] text-white pb-20">
    <!-- <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.15),transparent_35%),radial-gradient(circle_at_80%_0%,rgba(255,255,255,0.08),transparent_25%)]">
    </div> -->
    <div class="mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <div data-aos="zoom-in">
            <h1 class="hero-title text-4xl md:text-5xl font-extrabold leading-tight">
                {{ __('landing.hero_title') }}{{ $identity->nama_desa ?? 'Nama Desa' }}</h1>
            <p class="hero-subtitle mt-4 text-gray-300 max-w-lg">
                {{ $identity->nama_desa ?? 'Nama Desa' }}{{ __('landing.hero_subtitle') }}
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#program"
                    class="px-5 py-3 rounded-lg border border-emerald-200 text-white hover:bg-white/10 transition">Program
                    Unggulan</a>
            </div>
        </div>
        <img src="{{ Vite::asset('resources/images/hero.jpg') }}" class="hero-img rounded-2xl shadow-lg w-full" />
    </div>
</section>

{{-- PROFILE SECTION --}}
<section id="profil" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div class="space-y-4">
                <h2 class="text-3xl font-bold text-slate-900">Profil Singkat {{ $identity->nama_desa ?? 'Desa' }}</h2>
                <p class="text-slate-600 leading-relaxed">Kantor desa beralamat di
                    {{ $identity->alamat_kantor ?? 'alamat belum diisi' }}. Informasi kontak:
                    {{ $identity->email_desa ?? 'email belum diisi' }} /
                    {{ $identity->telepon_desa ?? 'telepon belum diisi' }}.</p>
                <ul class="space-y-3 text-slate-700">
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> Layanan publik digital dan
                        terintegrasi.</li>
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> Program ekonomi kerakyatan untuk UMKM
                        dan petani.</li>
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> Pelestarian budaya dan ruang terbuka
                        hijau.</li>
                </ul>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Kode Pos</p>
                    <p class="text-3xl font-bold text-emerald-600">{{ $identity->kode_pos ?? '-' }}</p>
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Kecamatan</p>
                    <p class="text-3xl font-bold text-emerald-600">{{ $identity->nama_kecamatan ?? '-' }}</p>
                    <!-- <p class="mt-2 text-sm text-slate-600">APBDes dipublikasikan berkala.</p> -->
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Kabupaten</p>
                    <p class="text-3xl font-bold text-emerald-600">{{ $identity->kabupaten ?? '-' }}</p>
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Provinsi</p>
                    <p class="text-3xl font-bold text-emerald-600">{{ $identity->provinsi ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DATA DESA SECTION --}}
<section id="data" class=" py-16" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Data Desa</h2>
        <div class="grid md:grid-cols-2 gap-8">

            {{-- LEFT SIDE – 4 DATA CARDS --}}
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">

                {{-- Jumlah Penduduk --}}
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 20a6 6 0 00-12 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </div>
                    <h2 class="text-base sm:text-lg md:text-xl font-semibold text-slate-900 mb-2">Jumlah Penduduk</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-orange-600">4.820</p>
                    <p class="text-xs sm:text-sm md:text-sm text-slate-500">Data per Oktober 2025</p>
                </div>

                {{-- Kepala Keluarga --}}
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l9-9 9 9M4.5 10.5V21h15V10.5" />
                        </svg>
                    </div>
                    <h2 class="text-base sm:text-lg md:text-xl font-semibold text-slate-900 mb-2">Kepala Keluarga</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-orange-600">1.243</p>
                    <p class="text-xs sm:text-sm md:text-sm text-slate-500">Data terupdate</p>
                </div>

                {{-- Luas Wilayah --}}
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75l6-3 6 3 6-3v12l-6 3-6-3-6 3v-12z" />
                        </svg>
                    </div>
                    <h2 class="text-base sm:text-lg md:text-xl font-semibold text-slate-900 mb-2">Luas Wilayah</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-orange-600">12,3 km²</p>
                    <p class="text-xs sm:text-sm md:text-sm text-slate-500">Meliputi 4 dusun & 8 RT</p>
                </div>

                {{-- Jumlah Program --}}
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <h2 class="text-base sm:text-lg md:text-xl font-semibold text-slate-900 mb-2">Jumlah Program</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-orange-600">32</p>
                    <p class="text-xs sm:text-sm md:text-sm text-slate-500">Program Desa</p>
                </div>

            </div>


            {{-- RIGHT SIDE – GOOGLE MAPS --}}
            <div class="rounded-2xl bg-white shadow-lg border border-slate-100 overflow-hidden">
                <h2 class="text-lg font-semibold text-slate-900 p-4 pb-2">Lokasi Desa</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.560814677484!2d114.70990597497083!3d-3.3454190966420616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4226c4c32732d%3A0xc0cc721e868ba9dd!2sLiang%20Anggang%2C%20Kec.%20Bati-Bati%2C%20Kabupaten%20Tanah%20Laut%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1736162800000!5m2!1sid!2sid"
                    class="w-full h-96 border-0" loading="lazy">
                </iframe>
            </div>

        </div>
    </div>
</section>

{{-- NEWS SECTION --}}
<section id="news" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-2">{{ __('landing.hero_news') }}</h2>
        <p class="text-slate-500 mb-8">Artikel dan berita terbaru</p>


        <div class="grid md:grid-cols-4 gap-6">
            @foreach($news as $n)
            <div data-aos="fade-up" class="shadow rounded-lg overflow-hidden bg-white hover:shadow-lg transition">
                <img src="{{ $n['img'] }}" class="h-40 w-full object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-slate-900">{{ $n['title'] }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ $n['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PHOTOS SECTION --}}
<section id="photos" class="bg-[#0A332C] text-white py-16" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Galeri</h2>
        <p class="text-gray-300 mb-8 max-w-xl">Foto-foto Desa Liang Anggang</p>


        <div class="grid md:grid-cols-4 gap-6">
            @foreach($photos as $p)
            <div class="bg-white text-gray-800 rounded-lg shadow overflow-hidden">
                <img src="{{ $p['img'] }}" class="h-80 w-full object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-slate-900">{{ $p['title'] }}</h3>
                    <!-- <p class="text-orange-600 font-bold">{{ $p['desc'] }}</p> -->
                </div>
            </div>
            @endforeach
        </div>


        <a href="#"
            class="mt-8 inline-block px-6 py-3 bg-orange-500 hover:bg-orange-600 rounded-md text-sm font-semibold text-white">Lihat
            Lebih Banyak Foto →</a>
    </div>
</section>

{{-- KONTAK DESA SECTION --}}
<!-- <section id="kontak" data-aos="zoom-out">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div class="">
                <p class="text-sm uppercase tracking-wide text-emerald-700 font-semibold">Kontak</p>
                <h2 class="text-3xl font-bold text-slate-900">Butuh informasi atau ingin berkolaborasi?</h2>
                <p class="text-slate-700">Hubungi sekretariat {{ $identity->nama_desa ?? 'desa' }} untuk layanan publik,
                    kolaborasi program, atau permintaan data terbuka.</p>
                <div class="space-y-2 text-slate-700">
                    <p><span class="font-semibold">Kantor:</span> {{ $identity->alamat_kantor ?? 'Belum diisi' }}</p>
                    <p><span class="font-semibold">Telepon:</span> {{ $identity->telepon_desa ?? '-' }}</p>
                    <p><span class="font-semibold">Email:</span> {{ $identity->email_desa ?? '-' }}</p>
                    <p><span class="font-semibold">Website:</span> {{ $identity->website_desa ?? '-' }}</p>
                    <p><span class="font-semibold">Kepala Desa:</span> {{ $identity->kepala_desa ?? '-' }}</p>
                </div>
            </div>
            <div class="p-8 rounded-2xl bg-white shadow-lg border border-slate-100 space-y-4">
                <h3 class="text-xl font-semibold text-slate-900">Sampaikan pesan</h3>
                <form class="space-y-3">
                    <input type="text" placeholder="Nama"
                        class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <input type="email" placeholder="Email"
                        class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <textarea rows="3" placeholder="Pesan"
                        class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                    <button type="button"
                        class="w-full px-4 py-3 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">Kirim
                        Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section> -->

@endsection