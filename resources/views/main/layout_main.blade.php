<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ $icon }}" class="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('landingpage/css/animate.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/style.css') }}">

    {{-- data table  --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    {{-- data table  --}}
</head>

<body>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col d-flex align-items-center">
                    <p class="mb-0 phone">
                        <marquee behavior="5" direction="">
                            Bendo Arab
                        </marquee>
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- nav  --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('main/home') }}">
                Bendo<span>Arab</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ url('main/home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('/produk') ? 'active' : '' }}">
                        <a href="{{ url('main/produk') }}" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item {{ Request::is('/riwayat') ? 'active' : '' }}">
                        <a href="{{ url('main/riwayat') }}" class="nav-link">Riwayat Pemesanan </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="{{ url('#') }}">
                            <b>Akun</b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="{{ url('#') }}" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ url('storage/' . auth()->user()->picture) }}" style="width: 20%"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <p class="dropdown-item-title">
                                            {{ auth()->user()->name }}
                                        </p>
                                        <p class="dropdown-item-title">
                                            {{ auth()->user()->no_wa }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('main/profile/') }}" class="dropdown-item dropdown-footer">Edit Profile
                            </a>
                            <a href="{{ url('logout') }}" class="dropdown-item dropdown-footer">Log Out </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    {{-- konten  --}}
    @yield('content')
    {{-- konten  --}}
    <section id="kontak">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">No Rekening Kami</h2>
                        <ul class="list-unstyled">
                            <li>
                                <table>
                                    @foreach ($norek as $item)
                                        <tr>
                                            <td style="color: white">{{ $item->nama }} </td>
                                            <td style="color: white"> : </td>
                                            <td style="color: white">{{ $item->norek }} </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">Kontak Kami</h2>
                        @foreach ($kontak as $item)
                            <ul class="list-unstyled">
                                <li>
                                    <p>
                                        <a target="blank" href="https://wa.me/{{ $item->wa }}"
                                            class="py-1 d-block">
                                            <i class="fa fa-whatsapp"> &nbsp; </i>
                                            {{ $item->wa }}
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a target="blank" href="mailto:{{ $item->email }}" class="py-1 d-block">
                                            <i class="fa fa-envelope"> &nbsp; </i>
                                            {{ $item->email }}
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a target="blank"
                                            href="https://www.google.com/maps/search/{{ $item->alamat }}"
                                            class="py-1 d-block">
                                            <i class="fa fa-map-marker"> &nbsp; &nbsp; </i>
                                            {{ $item->alamat }}
                                        </a>
                                    </p>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-100 mt-5 border-top py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8">

                            <p class="copyright mb-0">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> | Dibuat Dengan <i class="fa fa-heart"
                                    aria-hidden="true"></i>
                                by <a href="#" target="_blank">Saya Sendiri</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ url('landingpage/js/jquery.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ url('landingpage/js/popper.min.js') }}"></script>
    <script src="{{ url('landingpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ url('landingpage/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ url('landingpage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('landingpage/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ url('landingpage/js/google-map.js') }}"></script>
    <script src="{{ url('landingpage/js/main.js') }}"></script>

    {{-- data table  --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    {{-- data table  --}}

</body>

</html>
