@extends('admin.layout.app')
@section('title','Tambah Jadwal')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">Tambah Jadwal Latihan</div>
        <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Hari</label>
                    <input type="text" name="hari" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Pelatih</label>
                    <input type="text" name="pelatih" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
