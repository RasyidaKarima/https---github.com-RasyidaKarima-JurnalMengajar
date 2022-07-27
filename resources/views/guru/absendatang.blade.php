@extends('layouts.sidebarGuru')

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="m-0 font-weight-bold"><strong>Absensi</strong></h4>
      <br>
      @if ( $absen == 0)
      <a href="{{route('absen-Create.guru')}}" class="btn btn-sm btn-success" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a>
      @else
      <!-- <a href="{{route('absen-Create.guru')}}" class="btn btn-sm btn-success disabled" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a> -->
      @endif
      
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
                ajax: '{!! route('absen.guru') !!}', // memanggil route yang menampilkan data json
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
                    }
                ]
            });
});
</script>
<script>
  $(document).on('click','.hapus', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
      title: 'Apakah anda yakin menghapus data ini?',
		  text: "Data yang dihapus tidak bisa dikembalikan!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Hapus Data!'
        }).then((result) => {
		  if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        document.location.href = href; //kembalikan nilai true dengan redirect document ke halaman yang dituju
  		}
    })
  });
</script>
@endpush