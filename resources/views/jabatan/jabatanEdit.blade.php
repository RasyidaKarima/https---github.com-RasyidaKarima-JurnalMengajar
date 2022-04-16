@extends('layouts.admin')

@section('title','Jabatan')

@section('content')

<h1> Edit Data Jabatan</h1>
<br>
<form action="{{route('jabatan.update', $jabatan->id)}}" method="post">
    @csrf
<div class="mb-3">
    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Masukkan Nama jabatan" value="{{$jabatan->nama_jabatan}}">
</div>

<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('jabatan.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection
