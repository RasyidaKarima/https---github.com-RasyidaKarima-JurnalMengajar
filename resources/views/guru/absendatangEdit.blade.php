@extends('layouts.sidebarGuru')

@section('content')

<div class="card">
        <h3> Tambah Absen Kedatangan</h3>

    <div class="card-body">
        <form action="{{ url('/absen-datang-guru/edit') }}/{{ auth()->user()->id }}" method="POST">
            @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{$datang->tanggal}}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label><br>
                <select class="custom-select" name="status" id="status" value="{{$datang->status}}">
                    <option value="">Pilih Status Kehadiran</option>
                    <option  value="WFO" @if($datang->status === 'WFO') 'selected' @endif > WFO</option>
                    <option  value="WFH" @if($datang->status === 'WFH') 'selected' @endif > WFH</option>
                </select>
                
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label><br>
            <select class="custom-select" name="kondisi" id="kondisi" value="{{$datang->kondisi}}">
                <option value="">Pilih Kondisi Kehadiran</option>
                <option  value="Sehat">Sehat</option>
                <option  value="Sakit">Sakit</option>
                <option  value="Ijin">Ijin</option>
                <option  value="Tugas Dinas">Tugas Dinas</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="font-weight-bold" for="foto">Foto Kehadiran</label>
            <input type="hidden" name="foto_old" value="{{ $datang->foto}}">
            <input type="file" name="foto" class="form-control form-control-file" accept="image/*" />
            <small class="text-danger">
                <b>NB*:</b> Kosongi jika tidak mengubah gambar.
            </small>
        </div>
        <br>
        <br>

        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('absen-datang.guru')}}" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
@endsection
