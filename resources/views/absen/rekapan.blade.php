@extends('layouts.admin')

@section('title','Absen')

@section('content')
<h1> Rekap Absensi </h1>

<div class="car-body">
    <div class="input-group mb-3">
        <label for="label">Tanggal Awal</label>
        <input type="date" name="tglawal" id="tglawal" class="form-control" />
    </div>


    <div class="car-body">
        <div class="input-group mb-3">
            <label for="label">Tanggal Akhir</label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
        </div>

        <div class="input-group mb-3">

            <button onclick="rekapanPertanggal()" class="btn btn-primary col-md-12"> Rekap Absensi Pertanggal <i class="fa fa-print"></i></button>

        </div>

    </div>

</div>
@endsection
