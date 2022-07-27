@extends('layouts.admin')

@section('title','Absen')

@section('content')
<h1> Absensi </h1>

<br>
<div class="card">
  <div class="card-body">
{{-- <div class="container"> --}}
  <table id="absenTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
    <thead class="bg-light text-uppercase">
      <tr>
        <th style="width:5%" class="text-center">No</th>
        <th style="width:15%">Nama</th>
        <th style="width:10%" class="text-center">Jabatan</th>
        <th style="width:10%" class="text-center">Tanggal</th>
        <th style="width:10%" class="text-center">Status</th>
        <th style="width:15%" class="text-center">Kondisi</th>
        <th style="width:15%" class="text-center">Foto</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($absen as $absen )
      <tr>
        <td class="text-center">{{$loop ->iteration}}</td>
        <td>{{$absen->name}}</td>
        <td class="text-center">{{$absen ->jabatan}}</td>
        <td class="text-center">{{$absen->tanggal}}</td>
        <td class="text-center">{{$absen->status}}</td>
        <td class="text-center">{{$absen->kondisi}}</td>
        <td class="text-center">
          <img src="{{ asset('storage/'.$absen->foto) }}" alt="{{ $absen->foto }}" class="img img-thumbnail" style="width: 100px !important;">
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
{{-- </div> --}}
</div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#absenTable').DataTable({
        paging: false,
        ordering: false,
        info: false,
        language:{
            "url":"https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
        }
        
    });
  });
</script>
@endpush
