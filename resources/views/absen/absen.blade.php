@extends('layouts.admin')

@section('title','Absen')

@section('content')
<h1> Absensi </h1>

<a href="{{route('absen.absenCreate')}}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"></i> Mulai Absen</a>
<br>
<br>

{{-- <div class="container"> --}}
  <table id="absenTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
    <thead class="bg-light text-uppercase">
      <tr>
        <th style="width:5%" class="text-center">No</th>
        <th style="width:15%">Nama</th>
        <th style="width:10%" class="text-center">Jam Masuk</th>
        <th style="width:10%" class="text-center">Jam Pulang</th>
        <th style="width:15%" class="text-center">Tanggal Absen</th>
        <th style="width:10%" class="text-center">Status</th>
        <th style="width:15%" class="text-center">Lampiran</th>
        <th style="width:30%" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($absen as $absen )
      <tr>
        <td class="text-center">{{$loop ->iteration}}</td>
        <td>{{$absen ->id_users}}</td>
        <td class="text-center">{{$absen ->jam_masuk}}</td>
        <td class="text-center">
            @if($absen->jam_pulang != '')
                {{$absen ->jam_pulang}}
            @else
                <i class="fa fa-times text-danger"></i>
            @endif
        </td>
        <td class="text-center">{{ date('d/m/Y', strtotime($absen ->tanggal_absen))}}</td>
        <td class="text-center">
            @if($absen->status == 'Hadir')
                <b>Hadir</b>
            @elseif($absen->status == 'Izin')
                <b class="text-primary">Izin</b>
            @else
                <b class="text-danger">Sakit</b>
            @endif
        </td>
        <td class="text-center">
          <img src="{{ url(''.$absen->lampiran) }}" alt="{{ $absen->lampiran }}" class="img img-thumbnail" style="width: 100px !important;">
        </td>
        <td class="text-center">
            <form action="{{route('absen.destroy',$absen->id)}}" method="POST">@csrf
                <a href="{{route('absen.edit', $absen->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete</button>
            </form>
      </tr>
    @endforeach
    </tbody>
  </table>
{{-- </div> --}}
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#absenTable').DataTable({
        paging: false,
        ordering: false,
        info: false
    });
  } );
</script>
@endpush
