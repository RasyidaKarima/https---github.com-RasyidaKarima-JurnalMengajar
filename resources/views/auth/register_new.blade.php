@extends('layouts.layout')

@section('content')

<div class="d-flex vh-100">
    <img class="w-75 w-sm-25 d-none d-sm-block" src="{{ asset('images/bg-login.jpg') }}" alt="">

    <div class="w-100 w-sm-75 p-5">
        <span class="h2">{{ __('Register') }}</span>
        <form method="POST" class="mt-3" action="{{ route('register') }}">
            @csrf
            <div class="form-group mt-3">
                <label for="exampleInputName1">{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleInputName1" placeholder="Masukkan nama">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputEmail1">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">{{ __('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputConfirmPassword1">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            </div>
            
            <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
        </form>
    </div>
</div>

@endsection