@extends('layouts.admin')

@section('title','Absen')

@section('content')

<h1> Tambah Absensi</h1>
<br>
<form action="{{route('absen.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
    <label for="id_users" class="form-label">Id User</label>
    <input type="text" class="form-control" id="id_users" name="id_users" placeholder="Masukkan Nama">
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status keterlambatan </label> <br>
    <input type="radio" name="status" value="Hadir"> Hadir
    <input type="radio" name="status" value="Izin"> Izin
    <input type="radio" name="status" value="sakit"> Sakit

</div>

<div class="mb-3">
    <label class="font-weight-bold" for="lampiran">Lampiran *</label>
    <input type="hidden" name="lampiran_old" value="{{ $absen->lampiran }}">
    <input type="file" name="lampiran" class="form-control form-control-file" accept="image/*" />
    <small class="text-danger">
        <b>NB*:</b> Kosongi jika tidak mengubah gambar.
    </small>
</div>
<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('absen.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection


