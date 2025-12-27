@extends('layout.app')
@section('title', 'Jadwal Latihan')

@section('content')
<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h4 class="mb-0 fw-bold">Jadwal Latihan</h4>
        <p class="text-muted mb-0">UKM Futsal Politeknik Caltex Riau</p>
    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 pb-0">
            <h6 class="mb-0 fw-semibold">Daftar Jadwal Latihan</h6>
        </div>

        <div class="card-body pt-3">

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table align-items-center table-hover mb-0">

                    <thead class="bg-gray-100">
                        <tr class="text-center text-uppercase text-xs fw-bold text-secondary">
                            <th>Hari</th>
                            <th>Jam Latihan</th>
                            <th>Lokasi</th>
                            <th>Pelatih</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jadwal as $j)
                            <tr class="text-center">

                                <td class="fw-semibold">
                                    <span class="badge bg-gradient-info px-3 py-2">
                                        {{ $j->hari }}
                                    </span>
                                </td>

                                <td class="text-sm">
                                    {{ $j->jam_mulai }} – {{ $j->jam_selesai }}
                                </td>

                                <td class="text-sm">
                                    {{ $j->lokasi }}
                                </td>

                                <td>
                                    <span class="badge bg-gradient-secondary">
                                        {{ $j->pelatih ?? 'Belum ditentukan' }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="ni ni-calendar-grid-58 fs-4"></i>
                                        <p class="mb-0 mt-2">Belum ada jadwal latihan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
