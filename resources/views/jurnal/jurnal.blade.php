@extends('layouts.admin')

@section('title','Jurnal')

@section('content')
<h1> Data Jurnal Mengajar</h1>

<a href="{{route('jurnal.jurnalCreate')}}" class="btn btn-success pull-right"> + Tambah Data</a>
<br>
<br>

<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:5%">No</th>
        <th style="width:10%">Nama</th>
        <th style="width:5%">Kelas</th>
        <th style="width:15%">Uraian Tugas</th>
        <th style="width:15%">Hasil</th>
        <th style="width:12%">Kendala</th>
        <th style="width:15%">Tindak Lanjut</th>
        <th style="width:15%">Foto Kegiatan</th>
        <th style="width:20%">Aksi</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($dataJurnal as $jurnal )

      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$jurnal ->nama}}</td>
        <td>{{$jurnal ->kelas}}</td>
        <td>{{$jurnal ->uraian_tugas}}</td>
        <td>{{$jurnal ->hasil}}</td>
        <td>{{$jurnal ->kendala}}</td>
        <td>{{$jurnal ->tindak_lanjut}}</td>
        <td>{{$jurnal ->foto_kegiatan}}</td>


        <td>
            <form action="{{route('jurnal.destroy',$jurnal->id)}}" method="POST">@csrf
                <a href="{{route('jurnal.edit', $jurnal->id)}}" class="btn btn-warning"> Edit</a>
                <button class="btn btn-danger"> Delete</button>
            </form>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
