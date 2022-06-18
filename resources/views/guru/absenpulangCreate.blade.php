@extends('layouts.sidebarGuru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold"> Tambah Absen Pulang</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/absen-pulang-guru') }}/{{ auth()->user()->id }}" enctype="multipart/form-data">
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
            <label class="font-weight-bold" for="foto">Foto Pulang</label>
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
@endsection