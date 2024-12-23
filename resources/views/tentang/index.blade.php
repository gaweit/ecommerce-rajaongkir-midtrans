@extends('layout')
@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    </header>

    <div class="page-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">Tentang Kami</span>
                    <h2 class="title-section">Mitra Terbaik Anda untuk Produk Pertanian Berkualitas</h2>
                    <div class="divider"></div>

                    <p>Kami adalah penyedia hasil pertanian berkualitas tinggi yang berkomitmen untuk mendukung petani lokal
                        dan menghadirkan produk segar langsung ke meja Anda. Kami percaya bahwa makanan sehat dan segar
                        adalah fondasi dari gaya hidup yang baik, dan kami berusaha untuk menyediakan produk terbaik dari
                        ladang kami ke rumah Anda. </p>
                    <p>Dengan pendekatan yang berfokus pada keberlanjutan dan kualitas, kami bekerja sama dengan petani yang
                        berdedikasi untuk memastikan bahwa setiap produk yang kami tawarkan memenuhi standar tertinggi. Kami
                        ingin Anda merasakan kenikmatan dari hasil bumi yang segar dan penuh nutrisi, sekaligus mendukung
                        komunitas petani yang menjadi tulang punggung produk kami..</p>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img style="width: 100%" src="{{ url('storage') }}/hasil.jpg" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
