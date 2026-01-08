@extends('admin.layout.app')
@section('title', 'Jadwal Latihan')

@section('content')
    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0 fw-bold">Jadwal Latihan</h4>
                <p class="text-muted mb-0">UKM Futsal Politeknik Caltex Riau</p>
            </div>

            <a href="{{ route('admin.jadwal-latihan.create') }}" class="btn btn-sm bg-gradient-primary text-white shadow-sm">
                <i class="ni ni-fat-add me-1"></i> Tambah Jadwal
            </a>
        </div>

        <!-- CARD -->
        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-header bg-white border-0 pb-0">
                <h6 class="mb-0 fw-semibold">Daftar Jadwal Latihan</h6>
            </div>

            <div class="card-body pt-3">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="ni ni-check-bold me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table align-items-center table-hover mb-0">

                        <thead class="bg-gray-100">
                            <tr class="text-center text-uppercase text-xs fw-bold text-secondary">
                                <th>Hari</th>
                                <th>Jam Latihan</th>
                                <th>Lokasi</th>
                                <th>Pelatih</th>
                                <th>Aksi</th>
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

                                    <td>
                                        <span class="text-sm">
                                            {{ $j->jam_mulai }} – {{ $j->jam_selesai }}
                                        </span>
                                    </td>

                                    <td class="text-sm">
                                        {{ $j->lokasi }}
                                    </td>

                                    <td>
                                        <span class="badge bg-gradient-secondary">
                                            {{ $j->pelatih ?? 'Belum ditentukan' }}
                                        </span>
                                    </td>

                                    <!-- AKSI -->
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="{{ route('admin.jadwal-latihan.edit', $j->id) }}"
                                                class="btn btn-sm btn-warning d-flex align-items-center justify-content-center"
                                                style="width:38px;height:38px;">
                                                <i class="ni ni-ruler-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.jadwal-latihan.destroy', $j->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus jadwal latihan ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                                    style="width:38px;height:38px;">
                                                    <i class="ni ni-fat-remove"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
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
