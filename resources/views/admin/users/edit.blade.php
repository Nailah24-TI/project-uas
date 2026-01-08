@extends('admin.layout.app')
@section('title','Edit User')

@section('content')
<div class="container-fluid py-4">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit User</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ $user->name }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password (Opsional)</label>
                        <input type="password" name="password" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak diubah</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">

                        @if($user->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$user->photo) }}"
                                     width="70" height="70"
                                     class="rounded-circle"
                                     style="object-fit: cover;">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-warning">
                        Update User
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
