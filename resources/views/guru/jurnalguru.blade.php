@extends('layouts.sidebarGuru')

@section('content')
<table id="jurnalTable" class="table table-bordered table-stripped">
    <thead>
      <tr>
        <th style="width:5%">No</th>
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
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
    $('#jurnalTable').DataTable();
  } );
</script>
@endpush
@endsection