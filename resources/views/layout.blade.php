<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="copyright" content="MACode ID">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url('seogram') }}/assets/css/maicons.css">
    <link rel="stylesheet" href="{{ url('seogram') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('seogram') }}/assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="{{ url('seogram') }}/assets/css/theme.css">
    <link rel="shortcut icon" href="{{ url('icon.webp') }}" type="image/x-icon">

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    {{-- data table --}}
</head>

<body> <!-- Back to top button -->
    <div class="back-to-top"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                @guest
                    <a href="{{ url('/') }}" class="navbar-brand">
                        {{-- <img style="width: 10%" src="{{ url('storage') }}/padi.png" alt="Logo"> --}}
                        E<span class="text-primary">Commerce</span>
                    </a>
                @endguest
                @auth

                    <a href="{{ url('main/home') }}" class="navbar-brand">
                        {{-- <img style="width: 10%" src="{{ url('storage') }}/padipng" alt="Logo"> --}}
                        E<span class="text-primary">Commerce</span>
                    </a>
                @endauth
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"> <span
                        class="navbar-toggler-icon"></span> </button>
                <div class="navbar-collapse collapse" id="navbarContent">
                    @guest
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('/') }}">Home</a> </li>
                            <li class="nav-item {{ Request::is('tentang*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('tentang') }}">Tentang Kami</a> </li>
                            <li class="nav-item {{ Request::is('produk*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('produk') }}">Produk</a> </li>
                            <li class="nav-item "> <a class="nav-link" href="#kontak">Kontak</a> </li>
                            <li class="nav-item"> <a class="btn btn-primary ml-lg-2" href="{{ url('login') }}">Login</a>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ Request::is('main/home*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('main/home') }}">Home</a> </li>
                            <li class="nav-item {{ Request::is('main/tentang*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('main/tentang') }}">Tentang Kami</a> </li>
                            <li class="nav-item {{ Request::is('main/produk*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('main/produk') }}">Produk</a> </li>
                            <li class="nav-item "> <a class="nav-link" href="#kontak">Kontak</a> </li>
                            <li class="nav-item {{ Request::is('main/riwayat*') ? 'active' : '' }}"> <a class="nav-link"
                                    href="{{ url('main/riwayat') }}">Riwayat Pemesanan</a> </li>
                            <li class="nav-item"> <a class="btn btn-primary ml-lg-2" href="{{ url('logout') }}">Logout</a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
        {{-- konten  --}}
        @yield('content')
        {{-- konten  --}}
        <footer class="page-footer bg-image" id="kontak"
            style="background-image: url({{ url('seogram') }}/assets/img/world_pattern.svg);">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-5 py-3">
                        <h3>Selamat Datang</h3>
                        <p>Temukan segala kebutuhan Anda di satu tempat! Kami adalah destinasi belanja online yang
                            menawarkan berbagai produk berkualitas, mulai dari fashion, elektronik, hingga perlengkapan
                            rumah tangga. Dengan koleksi yang selalu diperbarui dan harga yang bersaing, kami
                            berkomitmen untuk memberikan pengalaman berbelanja yang mudah dan menyenangkan. Jelajahi
                            berbagai kategori produk kami dan nikmati penawaran menarik setiap harinya. Belanja sekarang
                            dan temukan produk yang tepat untuk Anda!

                            .
                        </p>
                    </div>
                    <div class="col-lg-3 py-3">
                        <h5>Media Sosial</h5>
                        <ul class="footer-menu">
                            @foreach ($medsos as $item)
                                <li><a href="#"><span class="{{ $item->icon }}"></span>
                                        {{ $item->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-4 py-3">
                        <h5>Contact Us</h5>
                        <ul class="footer-menu">
                            @foreach ($kontak as $item)
                                <li><a href="#">
                                        {{ $item->deskripsi }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <p class="text-center" id="copyright">Copyright &copy; {{ date('Y') }} , Saya Sendiri </p>
            </div>
        </footer>
        <script src="{{ url('seogram') }}/assets/js/jquery-3.5.1.min.js"></script>
        <script src="{{ url('seogram') }}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('seogram') }}/assets/js/google-maps.js"></script>
        <script src="{{ url('seogram') }}/assets/vendor/wow/wow.min.js"></script>
        <script src="{{ url('seogram') }}/assets/js/theme.js"></script>



        {{-- data table --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    responsive: true,
                    // Optional: configure DataTables options here
                });
            });
        </script>
        {{-- data table --}}
</body>

</html>
