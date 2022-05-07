@extends('layouts.admin')

@section('title','Absen')

@section('content')
<h1> Rekap Absensi </h1>

<br>
<br>

<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:5%">No</th>
        <th style="width:15%">Nama</th>
        <th style="width:15%">Hadir</th>
        <th style="width:15%">Izin</th>
        <th style="width:15%">Sakit</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($dataAbsen as $absen )

      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$absen ->id_users}}</td>
        <td></td>
        <td></td>
        <td></td>
        {{-- <td>{{$absen ->jam_masuk}}</td>
        <td>{{$absen ->tanggal_absen}}</td>
        <td>{{$absen ->status}}</td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
