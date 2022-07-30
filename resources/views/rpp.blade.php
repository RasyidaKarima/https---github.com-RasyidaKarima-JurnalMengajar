@extends('layouts.admin')

@section('title','Tanda Tangan')

@section('content')


<br>
<div class="card">
    <div class="card-header">
    <h3><strong>Rencana Pembelajaran</strong></h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="table-responsive">
            <table id="rppTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
                <thead class="bg-light text-uppercase">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Kompetensi Inti</th>
                    <th>Penjelasan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($rencana as $rencana )

                    <tr>
                        <td>{{$loop ->iteration}}</td>
                        <td>{{$rencana ->name}}</td>
                        <td>{{$rencana ->mata_pelajaran}}</td>
                        <td>{{$rencana ->kompetensi_inti}}</td>
                        <td>{{$rencana ->penjelasan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@push('scripts')
<script>
  $(document).ready( function () {
    $('#rppTable').DataTable({
        language:{
                    "url":"https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
                }
    });
  } );
</script>
@endpush
