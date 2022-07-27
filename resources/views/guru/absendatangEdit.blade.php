@extends('layouts.sidebarGuru')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold"><strong>Edit Absensi</strong></h4>
    </div>

    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
    
        <div class="mb-3">
            <label for="status" class="form-label">Status</label><br>
                <select class="custom-select" name="status" id="status">
                    <option value="">Pilih Status Kehadiran</option>
                    <option  value="WFO" {{ $datang->status == 'WFO' ? 'selected':'' }}> WFO</option>
                    <option  value="WFH" {{ $datang->status == 'WFH' ? 'selected':'' }}> WFH</option>
                </select>
                
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label><br>
            <select class="custom-select" name="kondisi" id="kondisi">
                <option value="">Pilih Kondisi Kehadiran</option>
                <option  value="Sehat" {{ $datang->kondisi == 'Sehat' ? 'selected':'' }}>Sehat</option>
                <option  value="Sakit" {{ $datang->kondisi == 'Sakit' ? 'selected':'' }}>Sakit</option>
                <option  value="Ijin" {{ $datang->kondisi == 'Ijin' ? 'selected':'' }}>Ijin</option>
                <option  value="Tugas Dinas" {{ $datang->kondisi == 'Tugas Dinas' ? 'selected':'' }}>Tugas Dinas</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="font-weight-bold" for="foto_kegiatan">Foto </label>
            <br>
            <img src="{{ url('storage/') }}/{{ $datang->foto }}" width="100" alt="..."> 
            <input type="hidden" name="foto_old" value="{{ $datang->foto }}">
            <input type="file" name="foto" class="form-control form-control-file" accept="image/*" />
            <small class="text-danger">
                <b>NB*:</b> Kosongi jika tidak mengubah gambar.
            </small>
        </div>
        <br>
        <br>

        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('absen.guru')}}" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
@endsection