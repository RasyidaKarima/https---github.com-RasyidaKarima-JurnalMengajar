@extends('layouts.sidebarGuru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3> Tambah Data Jabatan</h3>
        <br>
    </div>
    <div class="card-body">
        <form action="{{route('jabatan.store')}}" method="POST">
            @csrf
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Masukkan Nama Jabatan">
        </div>

        <br>
        <br>

        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('jabatan.index')}}" class="btn btn-success">Kembali</a>
    </div>
    </div>
</div>
@endsection