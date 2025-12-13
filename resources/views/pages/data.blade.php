@extends('layouts.app')

@section('content')

<section class="bg-slate-50 py-12 sm:py-16">

    <div class="container mx-auto px-4 space-y-16">

        <!-- ================= HEADER DATA DESA ================= -->
        <div data-aos="fade-up">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900">
                Profil & Data Desa Liang Anggang
            </h1>
            <p class="mt-2 text-sm sm:text-base text-slate-600 max-w-3xl">
                Informasi resmi mengenai kondisi geografis, kependudukan, pemerintahan,
                serta transparansi anggaran Desa Liang Anggang.
            </p>
        </div>

        <!-- ================= RINGKASAN DATA UTAMA ================= -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up">

            @php
            $stats = [
            ['label'=>'Penduduk','value'=>$desa['penduduk'],'unit'=>'Jiwa'],
            ['label'=>'Kepala Keluarga','value'=>$desa['kk'],'unit'=>'KK'],
            ['label'=>'Luas Wilayah','value'=>$desa['luas'],'unit'=>'km²'],
            ['label'=>'Dusun','value'=>$desa['dusun'],'unit'=>'Dusun'],
            ];
            @endphp

            @foreach($stats as $stat)
            <div class="rounded-xl sm:rounded-2xl bg-white shadow-md border border-slate-100 p-4 sm:p-5">
                <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                <p class="text-2xl sm:text-3xl font-bold text-orange-600">
                    {{ $stat['value'] }}
                </p>
                <p class="text-xs text-slate-400">{{ $stat['unit'] }}</p>
            </div>
            @endforeach

        </div>

        <!-- ================= DATA GEOGRAFIS ================= -->
        <div class="grid lg:grid-cols-2 gap-8 items-start">

            <div data-aos="fade-right">
                
                <div class="bg-white rounded-xl shadow-sm border p-6 space-y-3 text-sm">
                    <h2 class="text-xl sm:text-2xl font-bold mb-4">Data Geografis</h2>
                    <p><strong>Provinsi:</strong> {{ $desa['provinsi'] }}</p>
                    <p><strong>Kabupaten:</strong> {{ $desa['kabupaten'] }}</p>
                    <p><strong>Kecamatan:</strong> {{ $desa['kecamatan'] }}</p>
                    <p><strong>Batas Wilayah:</strong></p>
                    <ul class="list-disc ml-5 text-slate-600">
                        <li>Utara: {{ $desa['batas_utara'] }}</li>
                        <li>Selatan: {{ $desa['batas_selatan'] }}</li>
                        <li>Timur: {{ $desa['batas_timur'] }}</li>
                        <li>Barat: {{ $desa['batas_barat'] }}</li>
                    </ul>
                </div>
            </div>

            <div data-aos="fade-left" class="bg-white rounded-xl shadow-sm border overflow-hidden">
                <iframe src="{{ $desa['maps_embed'] }}" class="w-full h-72 sm:h-96 border-0" loading="lazy">
                </iframe>
            </div>

        </div>

        <!-- ================= DATA KEPENDUDUKAN ================= -->
        <div data-aos="fade-up">
            <h2 class="text-xl sm:text-2xl font-bold mb-4">Data Kependudukan</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-xl border text-sm">
                    <p>Laki-laki</p>
                    <p class="text-xl font-bold">{{ $penduduk['laki'] }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl border text-sm">
                    <p>Perempuan</p>
                    <p class="text-xl font-bold">{{ $penduduk['perempuan'] }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl border text-sm">
                    <p>Usia Produktif</p>
                    <p class="text-xl font-bold">{{ $penduduk['produktif'] }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl border text-sm">
                    <p>Lansia</p>
                    <p class="text-xl font-bold">{{ $penduduk['lansia'] }}</p>
                </div>
            </div>
        </div>

        <!-- ================= GRAFIK ANGGARAN ================= -->
        <div data-aos="fade-up" class="bg-white rounded-xl border p-6 shadow-sm">
            <h2 class="text-xl sm:text-2xl font-bold mb-4">
                Grafik Anggaran Desa
            </h2>
            <div class="relative h-80">
                <canvas id="anggaranChart"></canvas>
            </div>
        </div>

        <!-- ================= TRANSPARANSI ANGGARAN ================= -->
        <div data-aos="fade-up">
            <h2 class="text-xl sm:text-2xl font-bold mb-4">
                Transparansi Anggaran Desa
            </h2>

            <div class="overflow-x-auto bg-white rounded-xl border shadow-sm">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="px-4 py-3">Kode</th>
                            <th class="px-4 py-3">Uraian</th>
                            <th class="px-4 py-3">Anggaran</th>
                            <th class="px-4 py-3">Realisasi</th>
                            <th class="px-4 py-3">Sumber</th>
                            <th class="px-4 py-3">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggaran as $a)
                        <tr class="border-t hover:bg-slate-50">
                            <td class="px-4 py-2">{{ $a['kode'] }}</td>
                            <td class="px-4 py-2">{{ $a['uraian'] }}</td>
                            <td class="px-4 py-2 text-right">
                                Rp {{ number_format($a['anggaran'],0,',','.') }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                Rp {{ number_format($a['realisasi'],0,',','.') }}
                            </td>
                            <td class="px-4 py-2">{{ $a['sumber'] }}</td>
                            <td class="px-4 py-2">{{ $a['tahun'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('anggaranChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($anggaran -> pluck('uraian')),
        datasets: [{
                label: 'Anggaran',
                data: @json($anggaran -> pluck('anggaran')),
                backgroundColor: 'rgba(251,146,60,0.8)'
            },
            {
                label: 'Realisasi',
                data: @json($anggaran -> pluck('realisasi')),
                backgroundColor: 'rgba(34,197,94,0.8)'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>



@endsection