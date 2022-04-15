@extends('layouts.admin')
@section('title', 'User')
@section('konten')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="viewTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $usr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usr->nama }}</td>
                        <td>{{ $usr->username }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->jabatan}}</td>
                        {{-- <td>
                            <a href="{{ route('user.edit', $usr->id) }}"
                                class="btn btn-warning btn-sm float-left mr-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('user.destroy', $usr->id) }}" method="POST"
                                class="float-left">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
