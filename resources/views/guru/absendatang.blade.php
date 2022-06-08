@extends('layouts.sidebarGuru')

@section('content')
<h4 class="m-0 font-weight-bold"><strong>Absensi Kedatangan</strong></h4>
<br>


    <a href="{{route('absen-datangCreate.guru')}}" class="btn btn-sm btn-success" id="tambahJurnal"><i class="fa fa-plus"></i> Tambah Data</a>
    <div class="col-md-3">
      <label>Filter Tanggal</label>
      <input type="text" class="datepicker">
    </div>
    <br>
    <br>
    <table style="color: #FFFFFF;" id="absDatangTable" class="table table-bordered table-striped yajra-datatable" >
        <thead>
          <tr class="text-center">
            <th style="width:2%">No</th>
            <th style="width:10%">Tanggal</th>
            <th style="width:15%">Status</th>
            <th style="width:12%">Kondisi</th>
            <th style="width:15%">Foto</th>
            <th style="width:20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datang as $ju )
                <tr>
                    <td>{{$loop ->iteration}}</td>
                    <td>{{$ju ->tanggal}}</td>
                    <td>{{$ju ->status}}</td>
                    <td>{{$ju ->kondisi}}</td>
                    <td>
                    <img src="{{ url(''.$ju->foto) }}" alt="{{ $ju->foto }}" class="img img-thumbnail" style="width: 100px !important;">
                    </td>
                    <td>
                        <form action="{{route('absen-datangDestroy.guru',$ju->id)}}" method="POST">@csrf
                            <a href="{{route('absen-datangEdit.guru', $ju->id)}}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger alert_notif"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#absDatangTable').DataTable(/*{
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
<script>
$(".datepicker").datepicker({
    format:"yyyy-mm-dd"
})
</script>
<script>
  $('.alert_notif').on('click',function(){
    var getLink = $(this).attr('href');
    Swal.fire({
      title: "Yakin hapus data?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonColor: '#3085d6',
      cancelButtonText: "Batal"

    }).then(result => {
    //jika klik ya maka arahkan ke proses.php
      if(result.isConfirmed){
        window.location.href = getLink
      }
    })
    return false;
  });
</script>
@endpush