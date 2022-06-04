@extends('layouts.admin')

@section('title','User')

@section('content')
<h1> Data User</h1>

<a href="{{route('user.userCreate')}}" class="btn btn-success pull-right"> + Tambah Data</a>
<br>
<br>

<div class="container">
  <table id="userTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow" >
    <thead class="bg-light text-uppercase" >
      <tr>
        <th style="width:5%">No</th>
        <th style="width:10%">Nama</th>
        <th style="width:15%">Username</th>
        <th style="width:15%">NIP</th>
        <th style="width:15%">Jabatan</th>
        <th style="width:20%">Email</th>
        <th style="width:35%">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dataUser as $data )

      <tr>
        <td>{{$loop ->iteration}}</td>
        <td>{{$data ->nama}}</td>
        <td>{{$data ->username}}</td>
        <td>{{$data ->nip}}</td>
        <td>{{$data ->jabatan}}</td>
        <td>{{$data ->email}}</td>
        <td>
            <form action="{{route('user.destroy',$data->id)}}" method="POST">@csrf
                <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning"> Edit</a>
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
    $('#userTable').DataTable();
  } );
</script>
@endpush
