@extends('layouts.sidebarKepsek')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.kepsek')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('validasi.kepsek')}}">Validasi Jurnal</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Tambah Validasi Jurnal</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"><strong>Profile</strong></h4>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td width="2">:</td>
                        <td>{{ $jurnal->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Penjelasan</td>
                        <td width="2">:</td>
                        <td>{{ $jurnal->rpp->penjelasan }}</td>
                    </tr>
                    <tr>
                        <td>Hasil</td>
                        <td width="2">:</td>
                        <td>{{ $jurnal->hasil }}</td>
                    </tr>
                    <tr>
                        <td>Kendala</td>
                        <td width="2">:</td>
                        <td>{{ $jurnal->kendala }}</td>
                    </tr>
                    <tr>
                        <td>Tindak Lanjut</td>
                        <td width="2">:</td>
                        <td>{{ $jurnal->tindak_lanjut }}</td>
                    </tr>
                    <tr>
                        <td>Foto Kegiatan</td>
                        <td width="2">:</td>
                        <td><img src="{{ url('images/jurnal') }}/{{ $jurnal->foto_kegiatan }}" width="100" alt="..."></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"><strong>Validasi Jurnal</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{route('validasi.update', $jurnal->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    <select id="status" name="status" class="form-control" required>
                        <option value="sudah divalidasi" {{ $jurnal->status == 'sudah divalidasi' ? 'selected':'' }} >Sudah Divalidasi</option>
                        <option value="belum divalidasi" {{ $jurnal->status == 'belum divalidasi' ? 'selected':'' }} >Belum Divalidasi</option>
                        <option value="sudah divalidasi terdapat kesalahan" {{ $jurnal->status == 'sudah divalidasi terdapat kesalahan' ? 'selected':'' }} >Masih ada kesalahan</option>
                       </select>

                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label><br>
                    <textarea name="pesan" class="form-control" id="pesan" rows="10" placeholder="Tuliskan pesan di sini...">{{$jurnal->pesan}}</textarea>
                </div>
            <br>
            <br>

            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('validasi.kepsek')}}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
