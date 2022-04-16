@extends('layouts.admin')

@section('title','Jabatan')

@section('content')

<h1> Tambah Data Jabatan</h1>
<br>
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
@endsection
