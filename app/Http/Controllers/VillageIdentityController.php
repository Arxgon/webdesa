<?php

namespace App\Http\Controllers;

use App\Models\VillageIdentity;

class VillageIdentityController extends Controller
{
    /**
     * Landing page untuk identitas desa.
     */
    public function landing()
    {
        $identity = VillageIdentity::query()->latest('updated_at')->first();

        if (! $identity) {
            abort(404, 'Data desa belum tersedia.');
        }

        return view('villageidentity.landing', compact('identity'));
    }

        public function history()
    {
        return view('pages.history');
    }

    public function profileArea()
    {
        return view('pages.profile-area');
    }

    public function profilePotention()
    {
        return view('pages.profile-potention');
    }

    public function development()
    {
        return view('pages.development');
    }

    public function stall()
    {
        return view('pages.stall');
    }

    public function news()
    {
        $news = [
            [
                'title' => 'Gotong Royong Pembangunan Jalan Desa',
                'desc'  => 'Warga Desa Liang Anggang melaksanakan gotong royong...',
                'img'   => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee',
                'date'  => '12 Oktober 2025',
                'category' => 'Pembangunan',
                'slug' => 'gotong-royong-jalan-desa'
            ],
        ];

        return view('pages.news', compact('news'));
    }

    public function data()
    {
         /* ================= PROFIL DESA ================= */
        $desa = [
            'nama'          => 'Desa Liang Anggang',
            'provinsi'      => 'Kalimantan Selatan',
            'kabupaten'     => 'Kabupaten Tanah Laut',
            'kecamatan'     => 'Bati-Bati',
            'luas'          => 12.3, // km2
            'dusun'         => 4,
            'rt'            => 8,
            'rw'            => 3,
            'penduduk'      => 4820,
            'kk'            => 1243,

            'batas_utara'   => 'Desa Gunung Raja',
            'batas_selatan' => 'Desa Pandahan',
            'batas_timur'   => 'Hutan Lindung',
            'batas_barat'   => 'Sungai Liang',

            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.560814677484!2d114.70990597497083!3d-3.3454190966420616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4226c4c32732d%3A0xc0cc721e868ba9dd!2sLiang%20Anggang%2C%20Kec.%20Bati-Bati%2C%20Kabupaten%20Tanah%20Laut%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1736162800000!5m2!1sid!2sid',
        ];

        /* ================= DATA KEPENDUDUKAN ================= */
        $penduduk = [
            'laki'       => 2450,
            'perempuan'  => 2370,
            'produktif'  => 3200,
            'lansia'     => 520,
            'anak'       => 1100,
        ];

        /* ================= DATA ANGGARAN ================= */
        $anggaran = collect([
            [
                'kode'      => '1.01',
                'uraian'    => 'Penyelenggaraan Pemerintahan Desa',
                'anggaran'  => 350000000,
                'realisasi' => 325000000,
                'sumber'    => 'Dana Desa',
                'tahun'     => 2025,
            ],
            [
                'kode'      => '1.02',
                'uraian'    => 'Pembangunan Infrastruktur Desa',
                'anggaran'  => 500000000,
                'realisasi' => 470000000,
                'sumber'    => 'APBDes',
                'tahun'     => 2025,
            ],
            [
                'kode'      => '1.03',
                'uraian'    => 'Pembinaan Kemasyarakatan',
                'anggaran'  => 180000000,
                'realisasi' => 160000000,
                'sumber'    => 'Dana Desa',
                'tahun'     => 2025,
            ],
            [
                'kode'      => '1.04',
                'uraian'    => 'Pemberdayaan Masyarakat',
                'anggaran'  => 220000000,
                'realisasi' => 210000000,
                'sumber'    => 'Bantuan Provinsi',
                'tahun'     => 2025,
            ],
            [
                'kode'      => '1.05',
                'uraian'    => 'Penanggulangan Bencana & Darurat',
                'anggaran'  => 120000000,
                'realisasi' => 90000000,
                'sumber'    => 'APBDes',
                'tahun'     => 2025,
            ],
        ]);

        return view('pages.data', compact(
            'desa',
            'penduduk',
            'anggaran'
        ));
    }

    public function photos()
    {
        return view('pages.photos');
    }
}