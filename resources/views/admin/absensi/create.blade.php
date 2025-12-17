@extends('admin.layout.app')

@section('content')
<div class="container py-4">
    <h4>Tambah Absensi</h4>

    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
