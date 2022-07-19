@extends('layouts.sidebarKepsek')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"><strong>Validasi Jurnal</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{route('validasi.update', $jurnal->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="status class="form-label">Status</label><br>
                    <select id="status" name="status" class="form-control" required>
                        <option value="{{ $jurnal->status}}">{{ $jurnal->status}}</option>
                        <option value="Tervalidasi">Tervalidasi</option>
                        <option value="Belum Divalidasi">Belum Divalidasi</option>
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
