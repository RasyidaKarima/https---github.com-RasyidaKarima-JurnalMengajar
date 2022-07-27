@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.guru')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Riwayat Jurnal</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="m-0 font-weight-bold"><strong>Jurnal Mengajar</strong></h4>
      <br>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped yajra-datatable" id="data_users_side" width="100%" >
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Tanggal</th>
              <th>Hasil</th>
              <th>Kendala</th>
              <th>URAIAN TUGAS/KEGIATAN</th>
              <th>Tindak Lanjut</th>
              <th>Foto Kegiatan</th>
              <th>Status</th>
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
                language:{
                    "url":"https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
                },
                ajax: '{!! route('jurnal-riwayat.guru') !!}', // memanggil route yang menampilkan data json
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        sClass:'text-center'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        sClass:'text-center'
                    },
                    {
                        data: 'hasil',
                        name: 'hasil',
                        sClass:'text-center'
                    },
                    {
                        data: 'kendala',
                        name: 'kendala',
                        sClass:'text-center'
                    },
                    {
                        data: 'rpp.penjelasan',
                        name: 'rpp.penjelasan',
                        sClass:'text-center'
                    },
                    {
                        data: 'tindak_lanjut',
                        name: 'tindak_lanjut',
                        sClass:'text-center'
                    },
                    {
                        data: 'foto_kegiatan',
                        name: 'foto_kegiatan',
                        sClass:'text-center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        sClass:'text-center'
                    }
                ]
            });
});
</script>
@endpush