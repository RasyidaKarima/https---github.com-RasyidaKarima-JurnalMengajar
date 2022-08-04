@extends('layouts.admin')

@section('title','Cetak Jurnal')

@section('content')
<h1> Cetak Jurnal Mengajar </h1>
<br>
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

            <button @click="cetakPertanggal()" class="btn btn-primary col-md-12"> Rekap Jurnal Pertanggal <i class="fa fa-print"></i></button>

        </div>

    </div>

</div>
@endsection
