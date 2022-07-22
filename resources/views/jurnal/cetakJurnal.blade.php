@extends('layouts.admin')

@section('title','Cetak Jurnal')

@section('content')
<h1> Cetak Jurnal Mengajar </h1>
<br>
<div class="car-body">
    
        <label for="label">Tanggal</label>
    <div class="input-group mb-2">
        <input type="date" name="tglawal" id="tglawal" class="form-control" />
    </div>

    <div class="car-body">

        <div class="input-group mb-3">

            <button type="button" onclick="cetakPertanggal()" class="btn btn-primary col-md-12"> Cetak Jurnal Pertanggal <i class="fa fa-print"></i></button>

        </div>

    </div>

</div>
@endsection
