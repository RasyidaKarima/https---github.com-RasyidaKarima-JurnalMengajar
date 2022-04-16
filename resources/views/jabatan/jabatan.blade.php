@extends('layouts.admin')

@section('title','Jabatan')

@section('content')
<h1> Data Jabatan</h1>

<a href="{{route('jabatan.jabatanCreate')}}" class="btn btn-success pull-right"> + Tambah Data</a>
<br>
<br>

<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:5%">No</th>
        <th style="width:10%">Nama Jabatan</th>
        <th style="width:20%">Created at</th>
        <th style="width:10%">Aksi</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($dataJabatan as $jabatan )

      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$jabatan->nama_jabatan}}</td>
        <td>{{$jabatan->created_at}}</td>

        <td>
            <form action="{{route('jabatan.destroy',$jabatan->id)}}" method="POST">@csrf
                <a href="{{route('jabatan.edit', $jabatan->id)}}" class="btn btn-warning"> Edit</a>
                <button class="btn btn-danger"> Delete</button>
            </form>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
