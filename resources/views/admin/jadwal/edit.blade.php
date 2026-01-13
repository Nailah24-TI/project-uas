@extends('admin.layout.app')
@section('title','Edit Jadwal')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header fw-bold">
            Edit Jadwal Latihan
        </div>

        <div class="card-body">

            {{-- ERROR GLOBAL --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.jadwal-latihan.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                                    {{-- TANGGAL --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                {{-- HARI --}}
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <input type="text"
                           name="hari"
                           value="{{ old('hari', $jadwal->hari) }}"
                           class="form-control @error('hari') is-invalid @enderror">

                    @error('hari')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JAM --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time"
                               name="jam_mulai"
                               value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                               class="form-control @error('jam_mulai') is-invalid @enderror">

                        @error('jam_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time"
                               name="jam_selesai"
                               value="{{ old('jam_selesai', $jadwal->jam_selesai) }}"
                               class="form-control @error('jam_selesai') is-invalid @enderror">

                        @error('jam_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- LOKASI --}}
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           value="{{ old('lokasi', $jadwal->lokasi) }}"
                           class="form-control @error('lokasi') is-invalid @enderror">

                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PELATIH --}}
                <div class="mb-3">
                        <label class="form-label">Pelatih</label>
                        <select name="pelatih" class="form-select" required>
                            <option value="">-- Pilih Pelatih --</option>
                            <option value="Coach Novri">Coach Novri</option>
                            <option value="Coach Haris">Coach Haris</option>
                            <option value="Coach Nailah">Coach Nailah</option>
                        </select>

                    @error('pelatih')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">
                    <button class="btn btn-success">
                        Update
                    </button>
                    <a href="{{ route('admin.jadwal-latihan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
