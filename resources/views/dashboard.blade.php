@extends('admin.layout.app')
@section('title','Dashboard')

@section('content')
<div class="container-fluid py-4">

{{-- HERO --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-success text-white shadow-lg rounded-4">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h4 class="fw-bold">⚽ Sistem Manajemen UKM Futsal</h4>
                    <p class="opacity-8 mb-0">Politeknik Caltex Riau</p>
                </div>
                <i class="ni ni-trophy text-5xl opacity-7"></i>
            </div>
        </div>
    </div>
</div>

{{-- STATISTIK --}}
<div class="row">
@php
$stats = [
    ['Total Anggota', $totalAnggota, 'ni-single-02', 'primary'],
    ['Total Latihan', $totalLatihan, 'ni-calendar-grid-58', 'warning'],
    ['Hadir Hari Ini', $hadirHariIni, 'ni-check-bold', 'success'],
];
@endphp

@foreach($stats as $s)
<div class="col-md-4 mb-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between">
            <div>
                <p class="text-uppercase text-sm mb-1">{{ $s[0] }}</p>
                <h5 class="fw-bold">{{ $s[1] }}</h5>
            </div>
            <div class="icon icon-shape bg-gradient-{{ $s[3] }} text-white rounded-circle">
                <i class="ni {{ $s[2] }}"></i>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

{{-- GRAFIK & INFO --}}
<div class="row">
<div class="col-lg-8 mb-4">
    <div class="card shadow-sm rounded-4 h-100">
        <div class="card-header border-0">
            <h6 class="fw-bold">📊 Statistik Kehadiran</h6>
        </div>
        <div class="card-body">
            <canvas id="chart-absensi" height="260"></canvas>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card shadow-sm rounded-4 h-100">
        <div class="card-header border-0">
            <h6 class="fw-bold">🔥 Top Kehadiran</h6>
        </div>
        <div class="card-body">
            @forelse($topAnggota as $t)
                <div class="d-flex justify-content-between mb-2">
                    <span>{{ $t->user->name ?? '-' }}</span>
                    <span class="badge bg-success">{{ $t->hadir }}</span>
                </div>
            @empty
                <p class="text-muted">Belum ada data</p>
            @endforelse
        </div>
    </div>
</div>
</div>

{{-- LATIHAN TERAKHIR --}}
<div class="row">
<div class="col-12">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <h6 class="fw-bold mb-2">📅 Latihan Terakhir</h6>
            @if($latihanTerakhir)
                <p class="mb-0">
                    {{ $latihanTerakhir->hari }} —
                    {{ $latihanTerakhir->jam_mulai }} s/d {{ $latihanTerakhir->jam_selesai }}
                    ({{ $latihanTerakhir->lokasi }})
                </p>
            @else
                <p class="text-muted mb-0">Belum ada jadwal</p>
            @endif
        </div>
    </div>
</div>
</div>

</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chart-absensi'), {
    type: 'bar',
    data: {
        labels: ['Hadir', 'Izin', 'Alpa'],
        datasets: [{
            data: [
                {{ $kehadiran['Hadir'] ?? 0 }},
                {{ $kehadiran['Izin'] ?? 0 }},
                {{ $kehadiran['Alpa'] ?? 0 }}
            ],
            backgroundColor: ['#2dce89','#fb6340','#f5365c'],
            borderRadius: 10
        }]
    },
    options: {
        plugins: { legend: { display: false }},
        scales: { y: { beginAtZero: true }}
    }
});
</script>
@endsection
