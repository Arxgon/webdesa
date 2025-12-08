<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $identity->nama_desa ?? 'Identitas Desa' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900">
    <header class="relative overflow-hidden bg-gradient-to-br from-emerald-600 via-teal-600 to-slate-900 text-white">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.15),transparent_35%),radial-gradient(circle_at_80%_0%,rgba(255,255,255,0.08),transparent_25%)]">
        </div>
        <div class="relative max-w-6xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    @php $logoUrl = $identity->getFirstMediaUrl('logo', 'thumb'); @endphp
                    @if($logoUrl)
                    <img src="{{ $logoUrl }}" alt="Logo {{ $identity->nama_desa ?? 'Desa' }}"
                        class="h-14 w-auto mb-4 drop-shadow-lg">
                    @endif
                    <p class="uppercase tracking-wide text-sm font-semibold text-emerald-100">Identitas
                        {{ $identity->nama_desa ?? 'Desa' }}</p>
                    <h1 class="mt-3 text-4xl lg:text-5xl font-bold leading-tight">Profil
                        {{ $identity->nama_desa ?? 'Desa' }} yang transparan, modern, dan dekat dengan warga.</h1>
                    <p class="mt-5 text-lg text-emerald-50">Kenali potensi, program, dan layanan publik
                        {{ $identity->nama_desa ?? 'desa' }} dalam satu halaman landing yang ringkas namun informatif.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#layanan"
                            class="px-5 py-3 rounded-lg bg-white text-emerald-700 font-semibold shadow-lg shadow-emerald-900/20 hover:-translate-y-0.5 transition">Lihat
                            Layanan</a>
                        <a href="#program"
                            class="px-5 py-3 rounded-lg border border-emerald-200 text-white hover:bg-white/10 transition">Program
                            Unggulan</a>
                    </div>
                </div>
                <div class="bg-white/10 border border-white/20 rounded-2xl backdrop-blur p-6 shadow-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <p class="text-sm text-emerald-100">Kode Desa</p>
                            <p class="text-3xl font-bold">{{ $identity->kode_desa ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-emerald-100">Kode Pos</p>
                            <p class="text-3xl font-bold">{{ $identity->kode_pos ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div class="rounded-xl bg-white/10 p-4">
                            <p class="text-sm text-emerald-100">Kecamatan</p>
                            <p class="text-2xl font-bold">{{ $identity->nama_kecamatan ?? '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4">
                            <p class="text-sm text-emerald-100">Kabupaten</p>
                            <p class="text-2xl font-bold">{{ $identity->nama_kabupaten ?? '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4">
                            <p class="text-sm text-emerald-100">Provinsi</p>
                            <p class="text-2xl font-bold">{{ $identity->nama_provinsi ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="mt-6 rounded-xl bg-white/10 p-4">
                        <p class="text-sm text-emerald-100">Visi</p>
                        <p class="text-lg font-semibold">Dipimpin oleh {{ $identity->kepala_desa ?? 'Kepala Desa' }}
                            dengan komitmen pelayanan publik.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-16 space-y-20">
        <section id="profil" class="grid md:grid-cols-2 gap-10 items-center">
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
                    <p class="text-sm text-slate-500">Indeks Desa</p>
                    <p class="text-3xl font-bold text-emerald-600">Mandiri</p>
                    <p class="mt-2 text-sm text-slate-600">Kategori Desa Mandiri 2024.</p>
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Anggaran</p>
                    <p class="text-3xl font-bold text-emerald-600">Transparan</p>
                    <p class="mt-2 text-sm text-slate-600">APBDes dipublikasikan berkala.</p>
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Konektivitas</p>
                    <p class="text-3xl font-bold text-emerald-600">4G</p>
                    <p class="mt-2 text-sm text-slate-600">Akses internet hingga dusun.</p>
                </div>
                <div class="rounded-2xl bg-white shadow-lg border border-slate-100 p-5">
                    <p class="text-sm text-slate-500">Partisipasi</p>
                    <p class="text-3xl font-bold text-emerald-600">Tinggi</p>
                    <p class="mt-2 text-sm text-slate-600">Musdes rutin dan terbuka.</p>
                </div>
            </div>
        </section>

        <section id="layanan" class="space-y-6">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-wide text-emerald-700 font-semibold">Layanan Publik</p>
                    <h2 class="text-3xl font-bold text-slate-900">Akses cepat untuk warga dan pendatang</h2>
                </div>
                <a href="#kontak" class="text-emerald-700 font-semibold hover:underline">Hubungi Sekretariat</a>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 rounded-2xl bg-white shadow-lg border border-slate-100">
                    <h3 class="text-xl font-semibold text-slate-900">Administrasi Kependudukan</h3>
                    <p class="mt-2 text-slate-600">Surat pengantar, pindah datang, KK, KTP, akta, dengan jadwal layanan
                        daring.</p>
                    <span
                        class="inline-block mt-4 px-3 py-1 bg-emerald-50 text-emerald-700 text-sm rounded-full">Layanan
                        Online</span>
                </div>
                <div class="p-6 rounded-2xl bg-white shadow-lg border border-slate-100">
                    <h3 class="text-xl font-semibold text-slate-900">Perizinan Usaha & UMKM</h3>
                    <p class="mt-2 text-slate-600">Pendampingan perizinan, sertifikasi halal, dan promosi produk
                        unggulan desa.</p>
                    <span
                        class="inline-block mt-4 px-3 py-1 bg-amber-50 text-amber-700 text-sm rounded-full">UMKM</span>
                </div>
                <div class="p-6 rounded-2xl bg-white shadow-lg border border-slate-100">
                    <h3 class="text-xl font-semibold text-slate-900">Layanan Sosial & Kesehatan</h3>
                    <p class="mt-2 text-slate-600">Posyandu, bantuan sosial terintegrasi, serta program kesehatan
                        lansia.</p>
                    <span
                        class="inline-block mt-4 px-3 py-1 bg-blue-50 text-blue-700 text-sm rounded-full">Kesehatan</span>
                </div>
            </div>
        </section>

        <section id="program" class="grid lg:grid-cols-3 gap-8 items-stretch">
            <div
                class="lg:col-span-2 p-8 rounded-2xl bg-gradient-to-br from-white via-emerald-50 to-emerald-100 border border-emerald-100 shadow-lg">
                <p class="text-sm uppercase tracking-wide text-emerald-700 font-semibold">Program Unggulan</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Program Desa Hijau</h2>
                <p class="mt-3 text-slate-700 leading-relaxed">Pengelolaan sampah terpadu, kebun desa organik, dan bank
                    sampah digital yang melibatkan karang taruna serta PKK.</p>
                <ul class="mt-4 space-y-2 text-slate-700">
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> 300 keluarga ikut pemilahan sampah
                        rumah tangga.</li>
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> 12 titik kebun pekarangan kolektif.
                    </li>
                    <li class="flex gap-3"><span class="text-emerald-600">•</span> Insentif poin untuk warga melalui
                        aplikasi desa.</li>
                </ul>
                <div class="mt-6 flex gap-3">
                    <a href="#"
                        class="px-5 py-3 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">Daftar
                        Relawan</a>
                    <a href="#"
                        class="px-5 py-3 rounded-lg border border-emerald-300 text-emerald-800 font-semibold hover:bg-white transition">Lihat
                        Detail</a>
                </div>
            </div>
            <div class="p-8 rounded-2xl bg-white shadow-lg border border-slate-100 space-y-4">
                <p class="text-sm uppercase tracking-wide text-emerald-700 font-semibold">Agenda Terdekat</p>
                <div class="space-y-4 text-slate-800">
                    <div>
                        <p class="text-sm text-slate-500">Minggu, 14 Jan</p>
                        <p class="font-semibold">Musyawarah Desa Bahas APBDes 2025</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Rabu, 24 Jan</p>
                        <p class="font-semibold">Pelatihan Branding UMKM</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Sabtu, 3 Feb</p>
                        <p class="font-semibold">Gerakan Tanam Pohon Serentak</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontak" class="grid md:grid-cols-2 gap-10 items-center">
            <div class="space-y-4">
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
        </section>
    </main>

    <footer class="bg-slate-900 text-slate-200">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-3">
            <p>© {{ date('Y') }} Pemerintah Desa. Semua hak dilindungi.</p>
            <div class="flex gap-4 text-sm">
                <a href="#profil" class="hover:text-white">Profil</a>
                <a href="#layanan" class="hover:text-white">Layanan</a>
                <a href="#program" class="hover:text-white">Program</a>
                <a href="#kontak" class="hover:text-white">Kontak</a>
            </div>
        </div>
    </footer>
</body>

</html>