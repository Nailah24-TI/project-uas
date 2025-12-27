@extends('layout.app')

@section('title','Absensi Saya')

@section('content')
<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Absensi Latihan</h4>
        <p class="text-muted mb-0">
            Silakan isi kehadiran latihan hari ini
        </p>
    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3">
            <i class="ni ni-check-bold me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- CARD -->
    <div class="card border-0 shadow rounded-4">
        <div class="card-body">

            <form action="{{ route('absensi.user.store') }}" method="POST">
                @csrf

                <!-- STATUS -->
                <div class="mb-4">
                    <label class="fw-semibold mb-2">Status Kehadiran</label>

                    @foreach(['Hadir','Izin','Alpa'] as $status)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="status"
                               value="{{ $status }}"
                               required>
                        <label class="form-check-label">
                            {{ $status }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <!-- SUBMIT -->
                <button type="submit"
                        class="btn bg-gradient-primary text-white rounded-pill px-4">
                    <i class="ni ni-check-bold me-1"></i>
                    Simpan Absensi
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
