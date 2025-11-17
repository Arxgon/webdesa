<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // 1) Pastikan ada penulis
            $author = User::first();
            if (! $author) {
                $author = User::forceCreate([
                    'name' => 'Admin Desa',
                    'username' => 'admindesa',
                    'email' => 'admin@desa.local',
                    'password' => bcrypt('password'),
                    'email_verified_at' => now(),
                ]);
            }

            // 2) Kategori khas website desa
            $categoriesData = [
                ['name' => 'Pemerintahan Desa', 'slug' => 'pemerintahan-desa', 'description' => 'Struktur, kebijakan, dan informasi pemerintahan desa.'],
                ['name' => 'Kabar Desa',        'slug' => 'kabar-desa',        'description' => 'Berita & pengumuman terkini di desa.'],
                ['name' => 'Pelayanan Publik',  'slug' => 'pelayanan-publik',  'description' => 'Layanan administrasi kependudukan & surat-menyurat.'],
                ['name' => 'UMKM & Bumdes',     'slug' => 'umkm-bumdes',       'description' => 'Ekonomi desa: UMKM, produk lokal, dan BUMDes.'],
                ['name' => 'Kesehatan',         'slug' => 'kesehatan',         'description' => 'Posyandu, stunting, vaksinasi, BPJS.'],
                ['name' => 'Pendidikan',        'slug' => 'pendidikan',        'description' => 'PAUD, sekolah, literasi desa.'],
                ['name' => 'Pariwisata',        'slug' => 'pariwisata',        'description' => 'Destinasi & promosi wisata desa.'],
                ['name' => 'Keagamaan',         'slug' => 'keagamaan',         'description' => 'Kegiatan keagamaan, jadwal ibadah.'],
                ['name' => 'Lingkungan',        'slug' => 'lingkungan',        'description' => 'Gotong royong, kebersihan, persampahan, penghijauan.'],
                ['name' => 'Keuangan Desa (APBDes)', 'slug' => 'keuangan-desa-apbdes', 'description' => 'Transparansi APBDes & laporan realisasi.'],
            ];

            $categories = collect($categoriesData)->map(function ($c) {
                return Category::firstOrCreate(
                    ['slug' => $c['slug']],
                    ['name' => $c['name'], 'description' => $c['description'] ?? null, 'order' => 0]
                );
            });

            // 3) Tag khas desa
            $tagsData = [
                ['name' => 'Musrenbang',      'slug' => 'musrenbang'],
                ['name' => 'BUMDes',          'slug' => 'bumdes'],
                ['name' => 'UMKM',            'slug' => 'umkm'],
                ['name' => 'Produk Lokal',    'slug' => 'produk-lokal'],
                ['name' => 'Posyandu',        'slug' => 'posyandu'],
                ['name' => 'Stunting',        'slug' => 'stunting'],
                ['name' => 'Vaksinasi',       'slug' => 'vaksinasi'],
                ['name' => 'PKK',             'slug' => 'pkk'],
                ['name' => 'RT/RW',           'slug' => 'rt-rw'],
                ['name' => 'Karang Taruna',   'slug' => 'karang-taruna'],
                ['name' => 'Gotong Royong',   'slug' => 'gotong-royong'],
                ['name' => 'Transparansi',    'slug' => 'transparansi'],
                ['name' => 'APBDes',          'slug' => 'apbdes'],
                ['name' => 'Surat Keterangan','slug' => 'surat-keterangan'],
                ['name' => 'KTP',             'slug' => 'ktp'],
                ['name' => 'KK',              'slug' => 'kk'],
                ['name' => 'BPJS',            'slug' => 'bpjs'],
                ['name' => 'PBB',             'slug' => 'pbb'],
                ['name' => 'Sampah',          'slug' => 'sampah'],
                ['name' => 'Pokdarwis',       'slug' => 'pokdarwis'],
                ['name' => 'e-Desa',          'slug' => 'e-desa'],
                ['name' => 'Bansos',          'slug' => 'bansos'],
                ['name' => 'Digitalisasi',    'slug' => 'digitalisasi'],
            ];

            $tags = collect($tagsData)->map(fn($t) => Tag::firstOrCreate(['slug' => $t['slug']], ['name' => $t['name']]));

            // 4) Data post relevan website desa
            $postsData = [
                [
                    'title' => 'Sambutan Kepala Desa & Visi Misi Pembangunan',
                    'category_slugs' => ['pemerintahan-desa'],
                    'tag_slugs' => ['transparansi', 'digitalisasi'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(7),
                    'excerpt' => 'Sambutan Kepala Desa, visi misi 2025–2030, arah pembangunan berbasis partisipasi warga.',
                ],
                [
                    'title' => 'Pengumuman Layanan KTP & KK: Jadwal dan Syarat',
                    'category_slugs' => ['pelayanan-publik', 'kabar-desa'],
                    'tag_slugs' => ['ktp', 'kk', 'surat-keterangan', 'e-desa'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(5),
                    'excerpt' => 'Informasi layanan administrasi kependudukan, berkas persyaratan, serta jadwal pelayanan di balai desa.',
                ],
                [
                    'title' => 'Jadwal Posyandu & Skrining Stunting Bulan Ini',
                    'category_slugs' => ['kesehatan'],
                    'tag_slugs' => ['posyandu', 'stunting', 'bpjs', 'vaksinasi'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(3),
                    'excerpt' => 'Kegiatan Posyandu: timbang, imunisasi, edukasi gizi, serta skrining prevalensi stunting.',
                ],
                [
                    'title' => 'Laporan Realisasi APBDes Triwulan III',
                    'category_slugs' => ['keuangan-desa-apbdes'],
                    'tag_slugs' => ['apbdes', 'transparansi'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(2),
                    'excerpt' => 'Ringkasan realisasi pendapatan & belanja desa, program prioritas, serta pagu tersisa.',
                ],
                [
                    'title' => 'Lomba Kebersihan Lingkungan & Pengelolaan Sampah',
                    'category_slugs' => ['lingkungan', 'kabar-desa'],
                    'tag_slugs' => ['gotong-royong', 'sampah', 'rt-rw'],
                    'status' => 'draft',
                    'published_at' => null,
                    'excerpt' => 'Ajak seluruh RT/RW ikut lomba kebersihan, edukasi pemilahan sampah & bank sampah.',
                ],
                [
                    'title' => 'Pelatihan UMKM: Kemasan & Pemasaran Produk Lokal',
                    'category_slugs' => ['umkm-bumdes'],
                    'tag_slugs' => ['umkm', 'produk-lokal', 'digitalisasi'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDay(),
                    'excerpt' => 'Penguatan UMKM: desain kemasan, foto produk, marketplace, dan akses permodalan.',
                ],
                [
                    'title' => 'Musrenbang Desa 2026: Aspirasi & Prioritas',
                    'category_slugs' => ['pemerintahan-desa'],
                    'tag_slugs' => ['musrenbang', 'rt-rw', 'pkk', 'karang-taruna'],
                    'status' => 'scheduled',
                    'published_at' => Carbon::now()->addDays(4),
                    'excerpt' => 'Agenda Musrenbang: penetapan prioritas, partisipasi warga, dan sinkronisasi program.',
                ],
                [
                    'title' => 'Launching Destinasi Wisata: Jelajah Sungai & Pokdarwis',
                    'category_slugs' => ['pariwisata'],
                    'tag_slugs' => ['pokdarwis', 'produk-lokal', 'umkm'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(1),
                    'excerpt' => 'Pembukaan jalur wisata sungai, paket kuliner lokal, dan peran Pokdarwis.',
                ],
                [
                    'title' => 'Jadwal Tarawih & Kegiatan Keagamaan Ramadan',
                    'category_slugs' => ['keagamaan'],
                    'tag_slugs' => ['rt-rw'],
                    'status' => 'draft',
                    'published_at' => null,
                    'excerpt' => 'Jadwal tarawih per dusun, safari keagamaan, dan kegiatan sosial selama Ramadan.',
                ],
                [
                    'title' => 'Informasi Banjir: Titik Rawan & Posko Darurat',
                    'category_slugs' => ['kabar-desa', 'lingkungan'],
                    'tag_slugs' => ['gotong-royong', 'rt-rw'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subHours(10),
                    'excerpt' => 'Update kondisi banjir, jalur evakuasi, dan logistik di posko darurat.',
                ],
            ];

            $createdPosts = [];

            foreach ($postsData as $data) {
                $slug = Str::slug($data['title']);

                $post = Post::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'user_id' => $author->id,
                        'title' => $data['title'],
                        'excerpt' => $data['excerpt'] ?? null,
                        'content' => $this->buildContentHTML($data['title']),
                        'status' => $data['status'],
                        'is_featured' => false,
                        'published_at' => $data['published_at'],
                        'reading_time_minutes' => 3,
                        'cover_image_url' => null,
                        'canonical_url' => null,
                    ]
                );

                // Sync kategori & tag sesuai slug yang diinginkan
                $catIds = $categories
                    ->whereIn('slug', $data['category_slugs'])
                    ->pluck('id')
                    ->all();
                $post->categories()->sync($catIds);

                $tagIds = $tags
                    ->whereIn('slug', $data['tag_slugs'])
                    ->pluck('id')
                    ->all();
                $post->tags()->sync($tagIds);

                $createdPosts[] = $post;
            }

            // 5) Komentar contoh pada beberapa post
            $targetForComments = collect($createdPosts)->filter(fn($p) => in_array($p->status, ['published', 'scheduled']))->take(3);

            foreach ($targetForComments as $post) {
                $c1 = Comment::firstOrCreate([
                    'commentable_type' => Post::class,
                    'commentable_id'   => $post->id,
                    'author_email'     => 'warga1@example.com',
                    'content'          => 'Terima kasih informasinya, sangat membantu!',
                ], [
                    'user_id'          => null,
                    'author_name'      => 'Warga 1',
                    'status'           => 'approved',
                ]);

                $c2 = Comment::firstOrCreate([
                    'commentable_type' => Post::class,
                    'commentable_id'   => $post->id,
                    'author_email'     => 'warga2@example.com',
                    'content'          => 'Apakah ada link pendaftaran online?',
                ], [
                    'user_id'          => null,
                    'author_name'      => 'Warga 2',
                    'status'           => 'pending',
                ]);

                Comment::firstOrCreate([
                    'commentable_type' => Post::class,
                    'commentable_id'   => $post->id,
                    'author_email'     => 'admin@desa.local',
                    'content'          => 'Untuk layanan online, silakan akses menu Pelayanan Publik.',
                    'parent_id'        => $c2->id,
                ], [
                    'user_id'          => null,
                    'author_name'      => 'Admin Desa',
                    'status'           => 'approved',
                ]);
            }
        });
    }

    private function buildContentHTML(string $title): string
    {
        return '<p><strong>' . e($title) . '</strong></p>'
            . '<p>Konten ini adalah contoh artikel website desa yang dibuat untuk kebutuhan uji coba panel admin Filament v4.</p>'
            . '<ul>'
            . '<li>Informasi layanan & pengumuman</li>'
            . '<li>Transparansi APBDes & kegiatan desa</li>'
            . '<li>Partisipasi warga dan gotong royong</li>'
            . '</ul>';
    }
}
