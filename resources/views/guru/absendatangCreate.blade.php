@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.guru')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Tambah Absen Datang</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"> Tambah Absen Kedatangan</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/absen-datang-guru') }}/{{ auth()->user()->id }}" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br>
                    <select class="custom-select" name="status" id="status">
                        <option selected>Pilih Status Kehadiran</option>
                        <option  value="WFO">WFO</option>
                        <option  value="WFH">WFH</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label><br>
                <select class="custom-select" name="kondisi" id="kondisi">
                    <option selected>Pilih Kondisi Kehadiran</option>
                    <option  value="Sehat">Sehat</option>
                    <option  value="Sakit">Sakit</option>
                    <option  value="Ijin">Ijin</option>
                    <option  value="Tugas Dinas">Tugas Dinas</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="font-weight-bold" for="foto">Foto Kedatangan</label>
                <input type="file" name="foto" class="form-control form-control-file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" required />
            </div>
            <br>
            <br>

            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/absen-datang-guru') }}" class="btn btn-success">Kembali</a>
        </div>
        </div>
    </div>
</div>
@endsection