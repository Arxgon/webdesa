@extends('layouts.app')

@section('content')
<section class="py-32 container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Lapak UMKM Desa</h1>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="font-semibold">Rempah Desa</h2>
            <p class="text-gray-600 text-sm">Jahe, kunyit, dan rempah lokal.</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="font-semibold">Keripik Singkong</h2>
            <p class="text-gray-600 text-sm">Olahan asli warga Liang Anggang.</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="font-semibold">Kopi Banua</h2>
            <p class="text-gray-600 text-sm">Kopi lokal dengan cita rasa khas.</p>
        </div>
    </div>
</section>
@endsection