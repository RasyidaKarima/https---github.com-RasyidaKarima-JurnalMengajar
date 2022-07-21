<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aplikasi Jurnal Mengajar UPT SD Negeri Butun 02</title>
    <link rel="icon" href="{!! asset('images/school-solid.svg') !!}"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.0/datatables.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/')}}/bootstrap1.min.css">
    <link rel="stylesheet" href="{{asset('css/guru.css')}}">
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" >

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/home-kepsek" class="simple-text">
                        UPT SD NEGERI BUTUN 02
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home.kepsek') }}">
                            <p>Dashboard</p>
                            <i class="fa-solid fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-section">
						<h4 class="text-section">Main Utama</h4>
					</li>
                    <li>
                        <a class="nav-link" href="{{ route('jurnal.kepsek') }}">
                            <p>Jurnal Mengajar</p>
                            <i class="fa-solid fa-book"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('absen.kepsek') }}">
                            <p>Absensi Kepala Sekolah</p>
                            <i class="fa-solid fa-clipboard"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('rpp.kepsek') }}">
                            <p>Rencana Pembelajaran</p>
                            <i class="fa-solid fa-list"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('validasi.kepsek') }}">
                            <p>Validasi Jurnal</p>
                            <i class="fa-solid fa-file"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand">  </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="no-icon">{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ url('profile-kepsek') }}">Profil</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-left">
                            Copyright
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            By 
                            <a href="">Student of State Polytechnic of Malang</a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('js/core/')}}/popper.min.js" type="text/javascript"></script>
<script src="{{asset('js/core/')}}/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('js/guru.js')}}" type="text/javascript "></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.0/datatables.min.js"></script>
@stack('scripts')
@include('sweetalert::alert')
</body>

</html>