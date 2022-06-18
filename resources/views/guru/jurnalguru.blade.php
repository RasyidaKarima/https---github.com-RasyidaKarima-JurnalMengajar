@extends('layouts.sidebarGuru')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="m-0"><strong>Jurnal Mengajar</strong></h4>
  </div>
  <br>
  <div class="card-body">
    <a href="{{route('jurnal.jurnalCreate')}}" class="btn btn-sm btn-success" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a>
    <a href="{{route('jurnal.jurnalCreate')}}" class="btn btn-sm btn-primary" id="filterJurnal"><i class="fa fa-filter"></i> Filter Tanggal</a>
    <div class="col-md-3">
      <label>Filter Tanggal</label>
      <input type="date" class="datepicker">
    </div>
    <br>
    <br>
    <table id="jurnalTable" class="table table-bordered ">
        <thead style="background: rgba(203, 203, 210, 0.15);">
          <tr class="text-center">
            <th style="width:2%">No</th>
            <th style="width:10%">Tanggal</th>
            <th style="width:15%">Hasil</th>
            <th style="width:12%">Kendala</th>
            <th style="width:15%">Tindak Lanjut</th>
            <th style="width:15%">Foto Kegiatan</th>
            <th style="width:15%">Status</th>
            <th style="width:20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($jurnal as $ju )
                <tr>
                    <td>{{$loop ->iteration}}</td>
                    <td>{{$ju ->tanggal}}</td>
                    <td>{{$ju ->hasil}}</td>
                    <td>{{$ju ->kendala}}</td>
                    <td>{{$ju ->tindak_lanjut}}</td>
                    <td>
                    <img src="{{ url(''.$ju->foto_kegiatan) }}" alt="{{ $ju->foto_kegiatan }}" class="img img-thumbnail" style="width: 100px !important;">
                    </td>
                    <td>{{$ju ->status}}</td>
                    <td>
                        <form action="{{route('jurnalguru.destroy',$ju->id)}}" method="POST">@csrf
                            <a href="{{route('jurnalguru.edit', $ju->id)}}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#jurnalTable').DataTable(/*{
      "ajax":{
        url:"{{ route('jurnal.guru') }}",
        type:"POST",
        data:function(d){
          d.tanggal = $("filter-tanggal").val()
        }
      }
    }*/);
  } );
</script>

@endpush