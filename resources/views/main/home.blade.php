@extends('layout')
@section('content')
    <div class="container">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    <h1 class="mb-4">Panen Terbaik, Dari Ladang ke Meja Anda!</h1>
                    <p class="text-lg text-grey mb-5">Nikmati hasil panen terbaik yang dipetik langsung dari ladang kami.
                        Kami membawa produk segar dan berkualitas ke meja Anda, mendukung petani lokal dengan setiap
                        pembelian.</p>
                    <a href="#" class="btn btn-primary btn-split">Pesan Sekarang <div class="fab"><span
                                class="mai-cart"></span></div></a>
                </div>
                <div class="col-md-6 py-5 wow zoomIn">
                    <!-- Carousel -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($slide as $index => $item)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($slide as $index => $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ url('storage/' . $item->gambar) }}" class="d-block w-100" alt="">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
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
            <center>
                <a href="#produk" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
            </center>
        </div> <!-- .container -->
    </div> <!-- .page-section -->


    <!-- Blog -->
    <div class="page-section" id="produk">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Our Product</div>
                <h2 class="title-section">Produk Terbaru</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row mt-5">
                @foreach ($produk as $item)
                    <div class="col-lg-3 py-3">
                        <div class="card-blog">
                            <div class="header">
                                <div class="post-thumb">
                                    <a href="{{ url('main/produk/' . $item->slug) }}">
                                        <img src="{{ url('storage/' . $item->gambar) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a
                                        href="{{ url('main/produk/' . $item->slug) }}">{{ $item->judul }}</a>
                                </h5>
                                <span><b>Kategori : </b>{{ $item->kategori->nama }}</span>
                                <div class="post-date">Posted on
                                    <span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span>
                                </div>
                                <div class="post-date">
                                    <a href="{{ url('main/produk/' . $item->slug) }}" class="btn btn-success btn-block">
                                        <i class="mai-eye"></i>
                                        Lihat Detail Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 mt-4 text-center wow fadeInUp">
                    <a href="{{ url('produk') }}" class="btn btn-primary">Lihat Lebih Banyak</a>
                </div>
            </div>
        </div>
    </div>
@endsection
