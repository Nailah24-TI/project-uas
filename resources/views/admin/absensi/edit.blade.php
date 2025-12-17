@extends('admin.layout.app')

@section('content')
<div class="container py-4">
    <h4>Edit Absensi</h4>

    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $absensi->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option {{ $absensi->status=='Hadir'?'selected':'' }}>Hadir</option>
                <option {{ $absensi->status=='Izin'?'selected':'' }}>Izin</option>
                <option {{ $absensi->status=='Alpha'?'selected':'' }}>Alpha</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
