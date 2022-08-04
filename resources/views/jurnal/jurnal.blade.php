@extends('layouts.admin')

@section('title','Jurnal')

@section('content')
<h1> Data Jurnal Mengajar</h1>

<br>
<div class="card">
<br>
  <div class="d-flex flex-row justify-content-end">
    <a href="{{ route('jurnal.exportWord') }}" target="_blank" class="btn btn-success mr-3 pull-right">Export Word</a>
  </div>
  <br>
  <div class="container">

    <div class="table-responsive">
      <table id="jurnalTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
        <thead class="bg-light text-uppercase">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th style="width:10%">Foto Kegiatan</th>
            <th style="width:10%">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($jurnal as $jurnal )

            <tr>
              <td>{{$loop ->iteration}}</td>
              <td>{{$jurnal ->name}}</td>
              <td>{{$jurnal ->jabatan}}</td>
              <td>{{$jurnal ->tanggal}}</td>
              <td>
                <img src="{{ asset('storage/'.$jurnal->foto_kegiatan) }}" alt="{{ $jurnal->foto_kegiatan }}" class="img img-thumbnail" style="width: 100px !important;">
              </td>
              <td>{{$jurnal ->status}}</td>
              <td>
              <a href="#" value="{{ action('jurnalController@show',['id'=>$jurnal->id])}}" class="btn btn-xs btn-info modalMd" title="Tampil Jurnal" data-toggle="modal" data-target="#modalMd"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="modalMdTitle"></h4>
                  </div>
                  <div class="modal-body">
                      <div class="modalError"></div>
                      <div id="modalMdContent"></div>
                  </div>
              </div>
          </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#jurnalTable').DataTable({
        language:{
                    "url":"https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
                }
    });
  } );
</script>
<script>
  $(document).on('ajaxComplete ready', function () {
    $('.modalMd').off('click').on('click', function () {
        $('#modalMdContent').load($(this).attr('value'));
        $('#modalMdTitle').html($(this).attr('title'));
    });
  });
</script>
@endpush
