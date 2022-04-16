@extends('layouts.admin')

@section('title','Jurnal')

@section('content')

<h1> Tambah Data Jurnal</h1>
<br>
<form action="{{route('jurnal.store')}}" method="POST">
    @csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
</div>

<div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas">
</div>

<div class="mb-3">
    <label for="uraian_tugas" class="form-label">Uraian Tugas</label>
    <input type="text" class="form-control" id="uraian_tugas" name="uraian_tugas" placeholder="Masukkan Uraian Tugas">
</div>

<div class="mb-3">
    <label for="hasil" class="form-label">Hasil</label>
    <input type="text" class="form-control" id="hasil" name="hasil" placeholder="Masukkan Hasil">
</div>

<div class="mb-3">
    <label for="kendala" class="form-label">Kendala</label>
    <input type="text" class="form-control" id="kendala" name="kendala" placeholder="Masukkan Kendala">
</div>

<div class="mb-3">
    <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
    <input type="text" class="form-control" id="tindak_lanjut" name="tindak_lanjut" placeholder="Masukkan Tindak Lanjut">
</div>

<div class="mb-3">
    <label class="font-weight-bold" for="foto_kegiatan">Foto Kegiatan *</label>
    <input type="file" name="foto_kegiatan" class="form-control form-control-file"
        accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" required />
</div>
<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('jurnal.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection


