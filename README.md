
# Website Desa (Laravel + Filament v4)

## Stack & Paket
- Laravel + Breeze + Filament v4
- Spatie Permission, Spatie Media Library

## Fitur yang tersedia
- Model & migrasi: Post/Category/Tag/Comment (polymorphic), VillageIdentity
- Filament Resources: Post, Category, Tag, Comment, User, VillageIdentity (singleton)
- ArticleController: daftar artikel, detail, filter kategori/tag, pencarian, komentar publik
- Landing page desa: `/desa` menampilkan data `VillageIdentity` (logo, kode wilayah, kontak, kepala desa)
- Aset web: favicon, PWA icons, OG image, logo flat transparan (`public/assets/*`)

## Jalankan lokal (ringkas)
1) `cp .env.example .env` lalu set DB & storage disk.  
2) `composer install && php artisan key:generate`.  
3) `php artisan migrate --seed` (buat akun admin Filament awal jika seeder disiapkan).  
4) `php artisan storage:link`.  
5) `npm install && npm run dev` (atau `build`).  
6) `php artisan serve` lalu buka `http://localhost:8000`.

## Rute utama
- Publik artikel (test): `/test`, `/test/artikel/{slug}`, `/test/kategori/{slug}`, `/test/tag/{slug}`, `/cari`.
- Landing identitas desa (test): `/test/desa`.
- Filament admin (default): `/admin`.

## Next tasks
- [ ] Isi/seed `village_identities` dengan data nyata (logo media optional).
- [ ] Hubungkan form kontak landing ke endpoint (email atau penyimpanan pesan).
- [ ] Tambah pagination/SEO meta untuk halaman kategori/tag bila diperlukan.
- [ ] Audit akses/role untuk halaman publik vs admin. 
