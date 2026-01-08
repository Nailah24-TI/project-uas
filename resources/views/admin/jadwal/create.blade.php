@extends('admin.layout.app')
@section('title','Tambah Jadwal')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header fw-bold">
            Tambah Jadwal Latihan
        </div>

        <div class="card-body">
            <form action="{{ route('admin.jadwal-latihan.store') }}" method="POST">
                @csrf

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- HARI --}}
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <input type="text" name="hari" class="form-control" placeholder="Contoh: Senin" required>
                </div>

                {{-- JAM --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>
                </div>

                {{-- LOKASI --}}
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                {{-- PELATIH --}}
                <div class="mb-3">
                    <label class="form-label">Pelatih</label>
                    <input type="text" name="pelatih" class="form-control" required>
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('jadwal-latihan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
