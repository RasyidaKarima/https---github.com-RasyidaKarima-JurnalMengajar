<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aplikasi Jurnal Mengajar UPT SD Negeri Butun 02</title>
    <link rel="icon" href="{!! asset('images/school-solid.svg') !!}"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/')}}/bootstrap1.min.css">
    <link rel="stylesheet" href="{{asset('css/')}}/guru.css?v=2.0.0 ">

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" >

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/home" class="simple-text">
                        UPT SD NEGERI BUTUN 02
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home.guru') }}">
                            <p>Dashboard</p>
                            <i class="fa-solid fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-section">
						<h4 class="text-section">Main Utama</h4>
					</li>
                    <li>
                        <a class="nav-link" href="{{ route('jurnal.guru') }}">
                            <p>Jurnal Mengajar</p>
                            <i class="fa-solid fa-book"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.html">
                            <p>Absensi Datang</p>
                            <i class="fa-solid fa-clipboard"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./typography.html">
                            <p>Absensi Pulang</p>
                            <i class="fa-solid fa-clipboard"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./icons.html">
                            <p>Rencana Pembelajaran</p>
                            <i class="fa-solid fa-list"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Account</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
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

<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ mix('js/app.js') }}"></script>

</body>

</html>