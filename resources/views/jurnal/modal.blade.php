@extends('layouts.admin')

@section('title','Jurnal')

@section('content')
<div class="row">
 <div class="col-lg-12">
  <table class="table table-bordered table-hover">
   <thead>
    <tr>
     <th>Kategori</th>
     <td>{{ $jurn->name }}</td>
     <td>{{$jurnal ->name}}</td>
              <td>{{$jurnal ->jabatan}}</td>
              <td>{{$jurnal ->tanggal}}</td>
              <td>{{$jurnal ->penjelasan}}</td>
              <td>{{$jurnal ->hasil}}</td>
              <td>{{$jurnal ->kendala}}</td>
              <td>{{$jurnal ->tindak_lanjut}}</td>
    </tr>
    <tr>
     <th>Jabatan</th>
     <td>{{  $jurn->jabatan }}</td>
    </tr>
    <tr>
     <th>Tanggal</th>
     <td>{{ $jurn->tanggal }}</td>
    </tr>
    <tr>
     <th>Uraian Tugas</th>
     <td>{{ $jurn->penjelasan }}</td>
    </tr>
    <tr>
     <th>Hasil</th>
     <td>{{ $jurn->hasil }}</td>
    </tr>
    <tr>
     <th>Kendala</th>
     <td>{{ $jurn->kendala }}</td>
    </tr>
    <tr>
     <th>Tindak Lanjut</th>
     <td>{{ $jurn->tindak_lanjut }}</td>
    </tr>
    <tr>
     <th>Foto Kegiatan</th>
     <img src="{{ asset('storage/'.$jurnal->foto_kegiatan) }}" alt="{{ $jurnal->foto_kegiatan }}" class="img img-thumbnail" style="width: 100px !important;">
    </tr>
    <tr>
     <th>Status Validasi</th>
     <td>{{ $jurn->status }}</td>
    </tr>
    <tr>
     <th>Tanda Tangan</th>
     <td>{{ $jurn->tanda_tangan }}</td>
    </tr>
   </thead>
  </table>
 </div>
</div>
@endsection