@extends('layouts.sidebarKepsek')

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="m-0 font-weight-bold"><strong>Jurnal Mengajar</strong></h4>
      <br>
      @if ( $absen > 0)
      <a href="{{route('jurnalCreate.kepsek')}}" class="btn btn-sm btn-success" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a>
      @endif

      <a href="{{ route('jurnal-riwayat.kepsek') }}" class="btn btn-sm btn-primary"><i class="fa fa-history"></i> Riwayat Jurnal</a>
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
              <th>Rencana Pembelajaran</th>
              <th>Tindak Lanjut</th>
              <th>Foto Kegiatan</th>
              <th>Status</th>
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
                ajax: '{!! route('jurnal.kepsek') !!}', // memanggil route yang menampilkan data json
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
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: false,
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
