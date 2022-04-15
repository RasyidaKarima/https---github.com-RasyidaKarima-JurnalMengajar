@extends('layouts.admin')

@section('title','User')

@section('content')

<h1> Tambah Data User</h1>
<br>
<form action="{{route('user.store')}}" method="POST">
    @csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
</div>

<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
</div>

<div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP">
</div>

<div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
</div>
<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('user.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection
