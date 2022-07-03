@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.guru')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Riwayat Absensi</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="m-0 font-weight-bold"><strong>Absensi</strong></h4>
      <br>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped yajra-datatable" id="data_users_side" width="100%" >
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Kondisi</th>
              <th>Foto</th>
            </tr>
          </thead>
        </table>
      </div>
      <br>
      <a href="{{route('home.guru')}}" class="btn btn-sm btn-warning">Kembali</a>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(function() {
    var table = $('#data_users_side').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 5,
                ajax: '{!! route('absen-riwayat.guru') !!}', // memanggil route yang menampilkan data json
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        sClass:'text-center'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        sClass:'text-center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        sClass:'text-center'
                    },
                    {
                        data: 'kondisi',
                        name: 'kondisi',
                        sClass:'text-center'
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        sClass:'text-center'
                    }
                ]
            });
});
</script>
@endpush