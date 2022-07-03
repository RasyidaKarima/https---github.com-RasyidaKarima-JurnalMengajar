@extends('layouts.sidebarKepsek')

@section('content')
<div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.kepsek')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: gray;">My Profile</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold"><strong>Profile</strong></h4>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td width="10">:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td width="10">:</td>
                        <td>{{ $user->nip }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td width="10">:</td>
                        <td>{{ $user->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td width="10">:</td>
                        <td>{{ $user->kelas }}</td>
                    </tr>
                    <tr>
                        <td>Mapel</td>
                        <td width="10">:</td>
                        <td>{{ $user->mapel }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
        <h4 class="m-0 font-weight-bold"><i class="fa fa-pencil-alt"></i><strong> Edit Profile</strong></h4>
        <br>
        <form method="POST" action="{{ url('profile') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-md-7">
                    <input style="background-color: #ecebeb; color: black;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nip" class="col-md-2 col-form-label text-md-right">{{ __('NIP') }}</label>

                <div class="col-md-7">
                    <input style="background-color: #ecebeb; color: black;" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $user->nip }}" autocomplete="nip">

                    @error('nip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan" class="col-md-2 col-form-label text-md-right">{{ __('Jabatan') }}</label>

                <div class="col-md-7">
                    <input style="background-color: #ecebeb; color: black;" id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $user->jabatan }}" required autocomplete="jabatan" autofocus>

                    @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="kelas" class="col-md-2 col-form-label text-md-right">{{ __('Kelas') }}</label>

                <div class="col-md-7">
                    <input style="background-color: #ecebeb; color: black;" id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ $user->kelas }}" autocomplete="kelas" autofocus>

                    @error('kelas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mapel" class="col-md-2 col-form-label text-md-right">{{ __('Mapel') }}</label>

                <div class="col-md-7">
                    <input style="background-color: #ecebeb; color: black;" id="mapel" type="text" class="form-control @error('mapel') is-invalid @enderror" name="mapel" value="{{ $user->mapel }}" autocomplete="mapel" autofocus>

                    @error('mapel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary" style="width: 100%; font-weight: bold; font-size: 16px;">
                        Save
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection