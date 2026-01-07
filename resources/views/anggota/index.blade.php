@extends('admin.layout.app')

@section('content')
<div class="container">
    <h4>Daftar Anggota</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
                <tr>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
