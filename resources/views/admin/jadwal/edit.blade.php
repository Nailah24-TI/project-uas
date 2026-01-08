@extends('admin.layout.app')
@section('title','Edit Jadwal')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">Edit Jadwal Latihan</div>
        <div class="card-body">
            <form action="{{ route('admin.jadwal-latihan.update',$jadwal->id) }}" method="POST">
                @csrf @method('PUT')

                <input type="text" name="hari" value="{{ $jadwal->hari }}" class="form-control mb-3">
                <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="form-control mb-3">
                <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="form-control mb-3">
                <input type="text" name="lokasi" value="{{ $jadwal->lokasi }}" class="form-control mb-3">
                <input type="text" name="pelatih" value="{{ $jadwal->pelatih }}" class="form-control mb-3">

                <button class="btn btn-success">Update</button>
                <a href="{{ route('admin.jadwal-latihan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
