@extends('layouts.layout')

@section('content')

<div class="d-flex vh-100">
    <img class="w-75 w-sm-25 d-none d-sm-block" src="{{ asset('images/bg-login.jpg') }}" alt="">

    <div class="w-100 w-sm-75 p-5">
        <span class="h2">Login</span>
        <form method="POST" class="mt-3" action="{{ route('login') }}">
            @csrf
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
            <div class="form-check mt-3">
                <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
        </form>
    </div>
</div>

@endsection