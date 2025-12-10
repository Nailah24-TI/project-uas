@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

<div class="py-4">
    <div class="card border-0 shadow">
        <div class="card-body">

            <h2 class="mb-4">Dashboard</h2>

            <div class="row">
                <div class="col-12 col-md-6 col-xl-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <p class="card-text fs-4 fw-bold">120</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Total Donasi</h5>
                            <p class="card-text fs-4 fw-bold">Rp 45.000.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Total Laporan</h5>
                            <p class="card-text fs-4 fw-bold">58</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Total Panti</h5>
                            <p class="card-text fs-4 fw-bold">12</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contoh tabel --}}
            <div class="card border-0 shadow mt-4">
                <div class="card-header bg-white">
                    <h5 class="m-0">Aktivitas Terbaru</h5>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Asep</td>
                                <td>Login ke sistem</td>
                                <td>10-12-2025</td>
                            </tr>
                            <tr>
                                <td>Rina</td>
                                <td>Menambahkan laporan</td>
                                <td>09-12-2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
