@extends('layouts.admin')

@section('title','Absen')

@section('content')

<h1> Tambah Absensi</h1>
<br>
<form action="{{route('absen.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
    <label for="id_users" class="form-label">Id User</label>
    <input type="text" class="form-control" id="id_users" name="id_users" placeholder="Masukkan Nama" value="{{ auth()->user()->id }}">
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status Kedatangan </label> <br>
    <input type="radio" name="status" value="Hadir"> Hadir
    <input type="radio" name="status" value="Izin"> Izin
    <input type="radio" name="status" value="Izin"> Sakit

</div>

{{-- <div class="mb-3">
    <label for="jam_masuk" class="form-label">Jam Masuk</label>
    <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Masukkan kelas">
</div>

<div class="mb-3">
    <label for="jam_keluar" class="form-label">Jam Keluar</label>
    <input type="text" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="Masukkan kelas">
</div> --}}

<div class="mb-3">
    <label class="font-weight-bold" for="lampiran">Lampiran *</label>
    <input type="file" name="lampiran" class="form-control form-control-file"
        accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" required />
</div>
<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('absen.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection


