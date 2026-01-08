@extends('admin.layout.app')

@section('title','Absensi')

@section('content')
<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Absensi Latihan</h4>
            <p class="text-muted mb-0">
                Tanggal {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
            </p>
        </div>

        <a href="{{ route('admin.absensi.export', $tanggal) }}"
           class="btn btn-sm bg-gradient-success text-white shadow-sm">
            <i class="ni ni-cloud-download-95 me-1"></i> Export Excel
        </a>
    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 pb-0">
            <h6 class="fw-semibold mb-0">Daftar Kehadiran Anggota</h6>
        </div>

        <div class="card-body pt-3">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                    <i class="ni ni-check-bold me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.absensi.updateAll') }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="bg-gray-100">
                            <tr class="text-uppercase text-xs text-secondary fw-bold text-center">
                                <th class="text-start">Nama Anggota</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($absensis as $a)
                            <tr>

                                <!-- NAMA -->
                                <td class="text-start fw-semibold">
                                    {{ $a->user->name }}
                                </td>

                                <!-- STATUS -->
                                @foreach(['Hadir','Izin','Alpa'] as $status)
                                <td class="text-center">
                                    <div class="form-check d-flex justify-content-center">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status[{{ $a->id }}]"
                                               value="{{ $status }}"
                                               {{ $a->status === $status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                @endforeach

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit"
                            class="btn bg-gradient-primary text-white px-4 rounded-pill shadow-sm">
                        <i class="ni ni-check-bold me-1"></i>
                        Simpan Absensi
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
