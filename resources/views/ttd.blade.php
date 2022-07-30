@extends('layouts.admin')

@section('title','Tanda Tangan')

@section('content')


<br>
<div class="card">
    <div class="card-header">
    <h3><strong>Tanda Tangan</strong></h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="table-responsive">
            <table id="ttdTable" class="table table-hover tale-bordered bg-white table-bordered table-striped shadow">
                <thead class="bg-light text-uppercase">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Tanda Tangan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($ttd as $ttd )

                    <tr>
                    <td>{{$loop ->iteration}}</td>
                    <td>{{$ttd ->name}}</td>
                    <td>{{$ttd ->tanggal}}</td>
                    <td>
                        <img src="{{ asset('images/signature/'.$ttd->tanda_tangan) }}" alt="{{ $ttd->tanda_tangan }}" class="img img-thumbnail" style="width: 170px !important;">
                    </td>
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
    $('#ttdTable').DataTable({
        language:{
                    "url":"https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
                }
    });
  } );
</script>
@endpush
