<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/')}}/style.css">

        <link rel="stylesheet" href="{{asset('css/')}}/owl.carousel.min.css">

        <link rel="stylesheet" href="{{asset('css/')}}/bootstrap2.min.css">

        <link rel="stylesheet" href="{{asset('css/')}}/login.css">

        <title>Login</title>
    </head>
    <body>

    <div class="content">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <img src="{{url('/images/login.svg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="mb-4">
                <h3>Login</h3>
                <p class="mb-4">Silahkan masukkan email dan password yang telah di daftarkan oleh admin untuk masuk ke dalam aplikasi</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group first">
                        <label for="username">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="submit" value="Login" class="btn btn-block btn-primary" style="background-color: #6c63ff; border-color: #6c63ff;">

                </form>
                </div>
            </div>

            </div>

        </div>
        </div>
    </div>

        <script src="{{asset('js/js/jquery-3.3.1.min.js')}}" type="text/javascript "></script>
        <script src="{{asset('js/js/popper.min.js')}}" type="text/javascript "></script>
        <script src="{{asset('js/js/bootstrap.min.js')}}" type="text/javascript "></script>
        <script src="{{asset('js/js/main.js')}}" type="text/javascript "></script>

    </body>
</html>
