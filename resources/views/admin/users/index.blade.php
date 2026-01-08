@extends('admin.layout.app')

@section('title', 'Manajemen Anggota')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0 fw-bold">Manajemen Anggota</h4>
                <small class="text-muted">
                    UKM Futsal Politeknik Caltex Riau
                </small>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>
                Tambah Anggota
            </a>
        </div>
        {{-- FILTER & SEARCH --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

            {{-- FILTER A–Z --}}
            <form method="GET" action="{{ route('admin.users.index') }}">
                <input type="hidden" name="search" value="{{ request('search') }}">

                <select name="sort" class="form-select" style="width:160px" onchange="this.form.submit()">
                    <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>
                        Nama A–Z
                    </option>
                    <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>
                        Nama Z–A
                    </option>
                </select>
            </form>

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex gap-2">
                <input type="hidden" name="sort" value="{{ request('sort', 'asc') }}">

                <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..."
                    value="{{ request('search') }}" style="width:220px">

                <button class="btn btn-primary">
                    <i class="fas fa-search">search</i>
                </button>
                {{-- CLEAR SEARCH --}}
                @if (request()->filled('search'))
                    <a href="{{ route('admin.users.index', ['sort' => request('sort', 'asc')]) }}"
                        class="btn btn-outline-secondary" title="Hapus pencarian">
                        <i class="fas fa-times">clear</i>
                    </a>
                @endif
            </form>

        </div>
        {{-- GRID USER --}}
        <div class="row">
            @forelse ($users as $user)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:16px; transition:.3s;"
                        onmouseover="this.style.transform='translateY(-6px)'"
                        onmouseout="this.style.transform='translateY(0)'">

                        <div class="card-body text-center">

                            {{-- AVATAR --}}
                            <div class="mb-3">
                                @if ($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" width="90" height="90"
                                        class="rounded-circle shadow" style="object-fit:cover;">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow"
                                        style="width:90px;height:90px;
                                        background:linear-gradient(135deg,#5e72e4,#825ee4);
                                        color:white;font-size:32px;margin:auto;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- INFO --}}
                            <h6 class="fw-bold mb-0">{{ $user->name }}</h6>
                            <small class="text-muted">{{ $user->email }}</small>

                            {{-- ROLE --}}
                            <div class="mt-2">
                                <span
                                    class="badge rounded-pill px-3 py-2
                            {{ $user->role === 'admin' ? 'bg-danger' : 'bg-info' }}">
                                    {{ ucfirst($user->role ?? 'Anggota') }}
                                </span>
                            </div>

                            {{-- AKSI --}}
                            <div class="d-flex justify-content-center gap-2 mt-4">

                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="btn btn-light btn-sm d-flex align-items-center justify-content-center gap-1 shadow-sm"
                                    style="min-width:90px;height:36px;border:1px solid #ffc107;">
                                    <i class="fas fa-edit text-warning"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-light btn-sm d-flex align-items-center justify-content-center gap-1 shadow-sm"
                                        style="min-width:90px;height:36px;border:1px solid #dc3545;">
                                        <i class="fas fa-trash text-danger"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada anggota terdaftar.
                    </div>
                </div>
            @endforelse
        </div>
        {{-- PAGINATION --}}
        @if ($users->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
