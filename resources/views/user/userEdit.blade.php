@extends('layouts.admin')

@section('title','User')

@section('content')

<h1> Edit Data User</h1>
<br>
<form action="{{route('user.update', $data->id)}}" method="post">
    @csrf
<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{$data->name}}">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{$data->email}}">
</div>

<div class="mb-3">
        <label for="role" class="form-control-label">Role :</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">---</option>
                <option value="guru" {{ $data->role == 'guru' ? 'selected':'' }}>Guru</option>
                <option value="admin" {{ $data->role == 'admin' ? 'selected':'' }}>Admin</option>
                <option value="kepsek" {{ $data->role == 'kepsek' ? 'selected':'' }}>Kepala Sekolah</option>
            </select>
    </div>

<div class="mb-3">
    <label for="jabatan" class="form-label">Password</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="">
</div>
<br>
<br>

<div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('user.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection
