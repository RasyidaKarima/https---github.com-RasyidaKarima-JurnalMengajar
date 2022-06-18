@extends('layouts.sidebarGuru')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="m-0 font-weight-bold"><strong>Absensi Pulang</strong></h4>
    <br>
    <a href="{{route('absen-pulangCreate.guru')}}" class="btn btn-sm btn-success" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a>
    <div class="col-md-3">
      <label>Filter Tanggal</label>
      <input type="text" class="datepicker">
    </div>
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
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
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
      ajax: '{!! route('absen-pulang.guru') !!}', // memanggil route yang menampilkan data json
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
            },
            {
              data: 'action',
              name: 'action',
              orderable: true,
              searchable: true,
              sClass:'text-center'
            },
          ]
        });
});
</script>
<script>
  $(document).on('click','.hapus', function (e) {
    e.preventDefault();
    let id = $(this).attr('id');
    Swal.fire({
      title: 'Apakah yakin hapus data ini?',
      text: "Kamu tidak dapat memulihkan data ini setelah terhapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
        },
        function() {
          $.ajax({
            url : "{{route('absen-pulangDestroy')}}" + id,
            type : 'post',
            data: {
                id: id,
                "_token" : "{{csrf_token()}}"
            },
            success: function (params) {
                alert(params.text)
                $('#data_users_side').DataTable().ajax.reload()
            }
          });
        });
  });
</script>
@endpush