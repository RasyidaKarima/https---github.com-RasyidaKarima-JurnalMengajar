@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.guru')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Tambah RPP</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"> Tambah RPP</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/rpp-guru') }}/{{ auth()->user()->id }}" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="mata_pelajaran" class="form-label">* Mata Pelajaran</label><br>
                    <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" placeholder="Masukkan Mata Pelajaran" required>
            </div>
            <div class="mb-3">
                <label for="kompetensi_inti" class="form-label">* Kompetensi inti</label><br>
                <input type="text" class="form-control" id="kompetensi_inti" name="kompetensi_inti" placeholder="kompetensi_inti" required>
            </div>
            <div class="mb-3">
                <label for="penjelasan" class="font-weight-bold" for="foto">* Penjelasan</label>
                <input type="text" class="form-control" id="penjelasan" name="penjelasan" placeholder="penjelasan" required>
            </div>
            <br>
            <br>

            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/rpp-guru') }}" class="btn btn-success">Kembali</a>
        </div>
        </div>
    </div>
</div>
@endsection