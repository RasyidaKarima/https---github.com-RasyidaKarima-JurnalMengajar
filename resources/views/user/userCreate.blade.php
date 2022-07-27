@extends('layouts.admin')

@section('title','User')

@section('content')

<h1> Tambah Data User</h1>
<br>
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap beserta gelar" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-control-label">Role :</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">---</option>
                <option value="guru">Guru</option>
                <option value="admin">Admin</option>
                <option value="kepsek">Kepala Sekolah</option>
            </select>
    </div>

    <br>
    <br>

    <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('user.index')}}" class="btn btn-success">Kembali</a>
    </div>
</form>
@endsection
