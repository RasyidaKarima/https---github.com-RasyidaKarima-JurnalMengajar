@extends('layouts.admin')

@section('title','Jurnal')

@section('content')
<h1> Data Jurnal Mengajar</h1>

<br>
<div class="card">
<br>
  <div class="d-flex flex-row justify-content-end">
    <a href="{{route('jurnal.exportExcel')}}" class="btn btn-success mr-3 pull-right">Export Excel</a>
  </div>
  <br>
  <div class="container">
  
    <div class="table-responsive">
      <table id="jurnalTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
        <thead class="bg-light text-uppercase">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Uraian Tugas</th>
            <th>Hasil</th>
            <th>Kendala</th>
            <th>Tindak Lanjut</th>
            <th style="width:10%">Foto Kegiatan</th>
            <th style="width:10%">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($jurnal as $jurnal )

            <tr>
              <td>{{$loop ->iteration}}</td>
              <td>{{$jurnal ->name}}</td>
              <td>{{$jurnal ->jabatan}}</td>
              <td>{{$jurnal ->tanggal}}</td>
              <td>{{$jurnal ->penjelasan}}</td>
              <td>{{$jurnal ->hasil}}</td>
              <td>{{$jurnal ->kendala}}</td>
              <td>{{$jurnal ->tindak_lanjut}}</td>
              <td>
                <img src="{{ asset('images/jurnal/'.$jurnal->foto_kegiatan) }}" alt="{{ $jurnal->foto_kegiatan }}" class="img img-thumbnail" style="width: 100px !important;">
              </td>
              <td>{{$jurnal ->status}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#jurnalTable').DataTable();
  } );
</script>
@endpush
