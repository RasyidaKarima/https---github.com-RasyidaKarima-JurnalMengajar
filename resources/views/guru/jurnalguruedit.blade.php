@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.guru')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Edit Jurnal</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"><strong>Edit Jurnal</strong></h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3">
                    <label for="rpp_id" class="form-label">*RPP</label><br>
                        <select class="form-control @error('rpp_id') is-invalid @enderror" name="rpp_id" id="rpp_id">
                            <option selected>Pilih RPP</option>
                            @foreach ($rpp as $r)
                            <option  value="{{ $r->id }}" {{ old('rpp_id', $jurnal->rpp_id) == $r->id ? 'selected' : null }}>{{ $r->kompetensi_inti }}&nbsp-&nbsp{{ $r->penjelasan }}</option>
                            @endforeach
                        </select>
                        @error('rpp_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="hasil" class="form-label">Hasil</label><br>
                    <input type="text" class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" placeholder="Masukkan Hasil" value="{{ $jurnal->hasil }}">
                    @error('hasil')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kendala" class="form-label">Kendala</label><br>
                    <input type="text" class="form-control" id="kendala" name="kendala" placeholder="Masukkan Kendala" value="{{ $jurnal->kendala }}">
                </div>
                <div class="mb-3">
                    <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label><br>
                    <input type="text" class="form-control" id="tindak_lanjut" name="tindak_lanjut" placeholder="Masukkan Tindak Lanjut" value="{{ $jurnal->tindak_lanjut }}">
                </div>
            <div class="mb-3">
                <label class="font-weight-bold" for="foto_kegiatan">Foto Kegiatan</label>
                <br>
                <img src="{{ url('storage/') }}/{{ $jurnal->foto_kegiatan }}" width="100" alt="..."> 
                <input type="hidden" name="foto_old" value="{{ $jurnal->foto_kegiatan }}">
                <input type="file" name="foto_kegiatan" class="form-control form-control-file" accept="image/*" />
                <small class="text-danger">
                    <b>NB*:</b> Kosongi jika tidak mengubah gambar.
                </small>
            </div>
            <br>
            <br>

            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/jurnal-guru') }}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection