@extends('admin.layout.app')
@section('title', 'Tambah Jadwal')

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
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                    {{-- HARI (OTOMATIS) --}}
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="text" name="hari" id="hari" class="form-control" readonly>
                    </div>

                    {{-- JAM --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai"
                                class="form-control @error('jam_selesai') is-invalid @enderror">

                            @error('jam_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- LOKASI --}}
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>

                    {{-- PELATIH (DROPDOWN) --}}
                    <div class="mb-3">
                        <label class="form-label">Pelatih</label>
                        <select name="pelatih" class="form-select" required>
                            <option value="">-- Pilih Pelatih --</option>
                            <option value="Coach Novri">Coach Novri</option>
                            <option value="Coach Haris">Coach Haris</option>
                            <option value="Coach Nailah">Coach Nailah</option>
                        </select>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.jadwal-latihan.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPT OTOMATIS HARI --}}
    <script>
        document.getElementById('tanggal').addEventListener('change', function() {
            const hariInput = document.getElementById('hari');
            const tanggal = new Date(this.value);

            const hariIndo = [
                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'
            ];

            hariInput.value = hariIndo[tanggal.getDay()];
        });
    </script>
@endsection
