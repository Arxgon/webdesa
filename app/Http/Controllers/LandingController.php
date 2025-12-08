<?php


namespace App\Http\Controllers;


class LandingController extends Controller
{
public function index()
{
# Data statis (nanti bisa diganti dari database)
$news = [
    [
        'title' => 'Pembangunan Jalan Lingkungan Desa Liang Anggang',
        'img' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1200&q=80',
        'desc' => 'Perbaikan jalan lingkungan terus dilakukan untuk meningkatkan akses warga menuju pusat desa.'
    ],
    [
        'title' => 'Program Kebersihan Sungai Sungai Awang',
        'img' => 'https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?auto=format&fit=crop&w=1200&q=80',
        'desc' => 'Warga bersama perangkat desa melaksanakan gotong-royong membersihkan bantaran sungai.'
    ],
    [
        'title' => 'Pelatihan UMKM Produk Lokal Desa',
        'img' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=1200&q=80',
        'desc' => 'UMKM diarahkan untuk meningkatkan kualitas produk dan pemasaran digital.'
    ],
    [
        'title' => 'Festival Budaya Liang Anggang 2025',
        'img' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
        'desc' => 'Festival tahunan yang menampilkan seni tari, musik tradisional, dan kuliner khas desa.'
    ],
];

$photos = [
    [
        'title' => 'Madu Hutan Liang Anggang',
        'desc' => 'Dipanen langsung dari hutan sekitar desa.',
        'img' => 'https://images.unsplash.com/photo-1506619216599-9d16d0903dfd?q=80&w=1200'
    ],
    [
        'title' => 'Kopi Robusta Lokal',
        'desc' => 'Kopi hasil kebun warga dengan cita rasa khas.',
        'img' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1200'
    ],
    [
        'title' => 'Teh Herbal Daun Kelor',
        'desc' => 'Teh alami dari daun kelor organik desa.',
        'img' => 'https://images.unsplash.com/photo-1523906630133-f6934a1ab2b9?q=80&w=1200'
    ],
    [
        'title' => 'Produk Rempah Desa',
        'desc' => 'Jahe, kunyit, dan rempah bubuk dari petani lokal.',
        'img' => 'https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?auto=format&fit=crop&w=1200&q=80',
    ],
];

return view('landing.index', compact('news', 'photos'));
}
}
?>