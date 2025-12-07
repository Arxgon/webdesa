<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageIdentity;

class VillageIdentityLiangAnggangSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan hanya ada satu record (singleton) untuk identitas desa
        $identity = VillageIdentity::first();

        if (! $identity) {
            $identity = new VillageIdentity();
        }

        // Data spesifik Desa Liang Anggang (Tanah Laut, Kalimantan Selatan)
        $identity->nama_desa       = 'Liang Anggang';
        $identity->kode_desa       = '63.01.05.2004';   // Kode wilayah desa (Kemendagri) [2](https://www.wikidata.org/wiki/Q4212988)
        $identity->kode_pos        = '70852';           // Kode pos desa Liang Anggang (Bati-Bati, Tanah Laut) [3](https://kodeposku.id/kalimantan-selatan/tanah-laut/bati-bati/liang-anggang)[4](https://idalamat.com/alamat/775206/kantor-desa-liang-anggang-tanah-laut-kalimantan-selatan)
        $identity->kepala_desa     = null;              // Isi jika diketahui (opsional)
        $identity->alamat_kantor   = 'Liang Anggang, Kec. Bati-Bati, Kab. Tanah Laut, Kalimantan Selatan 70852'; // [4](https://idalamat.com/alamat/775206/kantor-desa-liang-anggang-tanah-laut-kalimantan-selatan)

        // Kontak publik (isi sesuai data resmi jika tersedia)
        $identity->email_desa      = null;
        $identity->telepon_desa    = null;
        $identity->website_desa    = null;

        // Hierarki wilayah
        $identity->nama_kecamatan  = 'Bati-Bati';
        $identity->nama_kabupaten  = 'Tanah Laut';
        $identity->nama_provinsi   = 'Kalimantan Selatan';

        // Kode wilayah (opsional; jika tidak tersedia resmi, biarkan null kecuali kode desa di atas)
        $identity->kode_kecamatan  = null;
        $identity->kode_kabupaten  = null;
        $identity->kode_provinsi   = '63';              // Kode provinsi Kalimantan Selatan (prefix 63) — umum dipakai untuk Kalsel [6](https://kodepos.co.id/kodepos/kalimantan-selatan/kota-banjarbaru/liang-anggang)

        // Kontak pemberitahuan (opsional—isi jika ada)
        $identity->nama_pemdes     = null;
        $identity->no_hp_pemdes    = null;
        $identity->jabatan_pemdes  = null;

        $identity->save();

        // (Opsional) Tambahkan media logo/foto kantor jika kamu punya file/URL valid:
        // $identity->clearMediaCollection('logo');
        // $identity->addMedia(public_path('seed/logo-liang-anggang.png'))->toMediaCollection('logo');
        // $identity->clearMediaCollection('office_photo');
        // $identity->addMedia(public_path('seed/kantor-liang-anggang.jpg'))->toMediaCollection('office_photo');

        $this->command->info('VillageIdentity untuk Desa Liang Anggang berhasil diset.');
    }
}
