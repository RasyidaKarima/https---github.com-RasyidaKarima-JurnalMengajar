@extends('layouts.sidebarKepsek')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.kepsek')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">Tanda Tangan Kepala Sekolah</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h4 class="m-0 font-weight-bold"><strong>Tanda Tangan</strong></h4>
        <br>
            Tanggal : {{\Carbon\Carbon::now()->isoFormat('D MMMM Y')}}
        </diV>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('signpad.save') }}">
                @csrf
                <div class="col-md-12">
                    <label>Signature:</label>
                    <br/>
                    <div id="sig"></div>
                        <br/><br/>
                        <textarea id="signature" name="signed" style="display: none"></textarea>
                </div>
                    <br/>
                        <a href="{{ url('/validasi-kepsek') }}" class="btn btn-success">Kembali</a>
                        <button id="clear" class="btn btn-danger">Clear</button>
                        @if ( $signature == 0 )
                        <button type="submit" class="btn btn-primary">Save</button>
                        @elseif ( $signature == 1 )
                        <br>
                        <br>
                        <div class="alert alert-danger alert-block">
                            <strong>Anda sudah melakukan tanda tangan pada hari ini</strong>
                        </div>
                        @endif
                        
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
</script>
@endpush