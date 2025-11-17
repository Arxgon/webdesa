<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VillageIdentity;

class VillageIdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageIdentity::firstOrCreate([], [
            'nama_desa' => 'Nama Desa',
            'kode_desa' => '',
            'kode_pos'  => '',
            'kepala_desa' => '',
            'alamat_kantor' => '',
            'email_desa' => '',
            'telepon_desa' => '',
            'website_desa' => '',
            'nama_kecamatan' => '',
            'nama_kabupaten' => '',
            'nama_provinsi'  => '',
            'kode_kecamatan' => '',
            'kode_kabupaten' => '',
            'kode_provinsi'  => '',
            'nama_pemdes'    => '',
            'no_hp_pemdes'   => '',
            'jabatan_pemdes' => '',
        ]);

    }
}
