@extends('layouts.admin')

@section('title','User')

@section('content')
<h1> Data User</h1>

<a href="{{route('user.userCreate')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
<br>
<br>

<div class="container">
  <table id="userTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow" >
    <thead class="bg-light text-uppercase" >
      <tr class="text-center">
        <th style="width:5%">No</th>
        <th style="width:20%">Nama</th>
        <th style="width:15%">NIP</th>
        <th style="width:15%">Jabatan</th>
        <th style="width:20%">Email</th>
        <th style="width:15%">Role</th>
        <th style="width:30%">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dataUser as $data )

      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$data ->name}}</td>
        <td>{{$data ->nip}}</td>
        <td>{{$data ->jabatan}}</td>
        <td>{{$data ->email}}</td>
        <td>{{$data ->role}}</td>
        <td>
            <form action="{{route('user.destroy',$data->id)}}" method="POST">@csrf
                <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
    $('#userTable').DataTable();
  } );
</script>
@endpush
