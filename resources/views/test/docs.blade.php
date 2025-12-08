@extends('test.layouts.app')

@section('title', 'API & Controller Docs')

@section('content')
<section class="space-y-10">
    <header class="bg-white border border-slate-200 shadow-sm rounded-xl p-6">
        <h1 class="text-2xl font-bold text-slate-900">Dokumentasi Endpoint</h1>
        <p class="mt-2 text-slate-600">Ringkasan endpoint publik yang tersedia dari controller dan API di proyek ini.</p>
    </header>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">ArticleController</h2>
            <p class="text-sm text-slate-600 mt-1">Listing artikel, detail, filter, pencarian, dan komentar publik.</p>
            <div class="mt-4 space-y-2">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test</p>
                        <p class="text-sm text-slate-700">Beranda listing artikel (paginate).</p>
                    </div>
                    <a href="{{ route('articles.index') }}" class="text-emerald-700 text-sm hover:underline">Buka</a>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test/artikel</p>
                        <p class="text-sm text-slate-700">Alias ke listing artikel.</p>
                    </div>
                    <a href="{{ route('articles.list') }}" class="text-emerald-700 text-sm hover:underline">Buka</a>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test/artikel/{slug}</p>
                        <p class="text-sm text-slate-700">Detail artikel + komentar.</p>
                        <p class="text-xs text-slate-500">Ganti {slug} dengan slug yang valid.</p>
                    </div>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test/kategori/{slug}</p>
                        <p class="text-sm text-slate-700">Filter artikel berdasarkan kategori.</p>
                    </div>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test/tag/{slug}</p>
                        <p class="text-sm text-slate-700">Filter artikel berdasarkan tag.</p>
                    </div>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /cari?q=kata</p>
                        <p class="text-sm text-slate-700">Pencarian artikel.</p>
                    </div>
                    <a href="{{ route('articles.search', ['q' => 'contoh']) }}" class="text-emerald-700 text-sm hover:underline">Contoh</a>
                </div>
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-amber-700">POST /test/artikel/{slug}/komentar</p>
                        <p class="text-sm text-slate-700">Kirim komentar publik (moderasi pending).</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">VillageIdentityController</h2>
            <p class="text-sm text-slate-600 mt-1">Landing identitas desa memakai data `village_identities`.</p>
            <div class="mt-4 space-y-2">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-mono text-xs text-emerald-700">GET /test/desa</p>
                        <p class="text-sm text-slate-700">Landing page identitas desa.</p>
                    </div>
                    <a href="{{ route('villageidentity.landing') }}" class="text-emerald-700 text-sm hover:underline">Buka</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-slate-900">Catatan</h2>
        <ul class="mt-3 space-y-2 text-slate-700 list-disc list-inside">
            <li>Gunakan slug kategori/tag/artikel yang valid agar halaman detail muncul.</li>
            <li>Endpoint komentar memerlukan payload: `author_name`, `author_email`, `content` (opsional `parent_id`).</li>
            <li>Data identitas desa diambil dari record terbaru tabel `village_identities`; sertakan media <code>logo</code> (opsional).</li>
            <li>Halaman ini hanya dokumentasi ringkas, bukan pengganti API explorer.</li>
        </ul>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <h2 class="text-xl font-semibold text-slate-900">Contoh Respons JSON</h2>
        <div class="mt-4 space-y-4">
            <div>
                <p class="font-semibold text-slate-800">Detail Artikel (test/artikel/{slug})</p>
                <pre class="mt-2 bg-slate-900 text-slate-100 text-sm rounded-lg p-4 overflow-auto">{
  "data": {
    "title": "Judul Artikel",
    "slug": "judul-artikel",
    "excerpt": "Ringkasan singkat ...",
    "content": "&lt;p&gt;Konten lengkap&lt;/p&gt;",
    "published_at": "2025-01-04T12:00:00Z",
    "author": { "name": "Admin" },
    "categories": [{ "name": "Berita", "slug": "berita" }],
    "tags": [{ "name": "desa", "slug": "desa" }],
    "comments": [
      { "author_name": "Warga", "content": "Mantap!", "created_at": "2025-01-05T01:02:03Z" }
    ]
  }
}</pre>
            </div>
            <div>
                <p class="font-semibold text-slate-800">Identitas Desa (test/desa)</p>
                <pre class="mt-2 bg-slate-900 text-slate-100 text-sm rounded-lg p-4 overflow-auto">{
  "data": {
    "nama_desa": "Desa Contoh",
    "kode_desa": "1234567890",
    "kode_pos": "12345",
    "kepala_desa": "Sutrisno",
    "alamat_kantor": "Jl. Raya Desa No. 12",
    "email_desa": "info@desakita.id",
    "telepon_desa": "0812xxxxxxx",
    "website_desa": "https://desa.id",
    "nama_kecamatan": "Kec. Makmur",
    "nama_kabupaten": "Kab. Sejahtera",
    "nama_provinsi": "Prov. Nusantara",
    "logo": "https://example.com/storage/logos/logo.png"
  }
}</pre>
            </div>
        </div>
    </div>
</section>
@endsection
