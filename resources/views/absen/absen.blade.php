@extends('layouts.admin')

@section('title','Absen')

@section('content')
<h1> Absensi </h1>

<a href="{{route('absen.absenCreate')}}" class="btn btn-success pull-right"> + Mulai Absen</a>
<br>
<br>

<div class="container">
  <table id="jabatanTable" class="table table-bordered table-stripped">
    <thead>
      <tr>
        <th style="width:5%">No</th>
        <th style="width:15%">Nama</th>
        <th style="width:15%">Jam Masuk</th>
        <th style="width:15%">Jam Pulang</th>
        <th style="width:15%">Tanggal Absen</th>
        <th style="width:15%">Status</th>
        <th style="width:15%">Lampiran</th>
        <th style="width:15%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($dataAbsen as $absen )
      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$absen ->id_users}}</td>
        <td>{{$absen ->jam_masuk}}</td>
        <td>{{$absen ->tanggal_absen}}</td>
        <td>{{$absen ->status}}</td>
        <td>
          <img src="{{ url(''.$absen->lampiran) }}" alt="{{ $absen->lampiran }}" class="img img-thumbnail" style="width: 100px !important;">
        </td>
        <td>
            <form action="{{route('absen.destroy',$absen->id)}}" method="POST">@csrf
                <a href="{{route('absen.edit', $absen->id)}}" class="btn btn-warning">Edit</a>
                <button class="btn btn-danger"> Delete</button>
            </form>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#absenTable').DataTable();
  } );
</script>
@endpush