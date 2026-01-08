@extends('admin.layout.app')
@section('title','Tambah User')

@section('content')
<div class="container-fluid py-4">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah User</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">
                        Simpan User
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
