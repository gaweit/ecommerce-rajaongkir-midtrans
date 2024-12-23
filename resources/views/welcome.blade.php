@extends('layout')
@section('content')
    <div class="container">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    <h1 class="mb-4">Selamat Datang!</h1>
                    <p class="text-lg text-grey mb-5">Temukan segala kebutuhan Anda di satu tempat! Kami adalah destinasi
                        belanja online yang menawarkan berbagai produk berkualitas, mulai dari fashion, elektronik, hingga
                        perlengkapan rumah tangga. Dengan koleksi yang selalu diperbarui dan harga yang bersaing, kami
                        berkomitmen untuk memberikan pengalaman berbelanja yang mudah dan menyenangkan. Jelajahi berbagai
                        kategori produk kami dan nikmati penawaran menarik setiap harinya. Belanja sekarang dan temukan
                        produk yang tepat untuk Anda!

                        .</p>
                    <a href="{{ url('produk') }}" class="btn btn-primary btn-split">Pesan Sekarang <div class="fab"><span
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
                    <h2 class="title-section">Mitra Terbaik Anda untuk Berbelanja Semua Kebutuhan</h2>
                    <div class="divider"></div>

                    <p>Selamat datang di [Nama Website Anda], destinasi belanja online yang menyediakan berbagai produk
                        berkualitas untuk memenuhi semua kebutuhan Anda. Kami berkomitmen untuk memberikan pengalaman
                        berbelanja yang mudah dan menyenangkan, dengan koleksi produk yang beragam, mulai dari fashion,
                        elektronik, perlengkapan rumah tangga, hingga kebutuhan sehari-hari.

                    </p>
                    <p>Kami percaya bahwa setiap pelanggan berhak mendapatkan produk terbaik dengan harga yang bersaing.
                        Oleh karena itu, kami bekerja sama dengan berbagai pemasok dan produsen terpercaya untuk memastikan
                        bahwa setiap produk yang kami tawarkan memenuhi standar kualitas tertinggi. Dengan fokus pada
                        kepuasan pelanggan, kami berusaha untuk menghadirkan inovasi dan kemudahan dalam setiap transaksi.

                        .</p>
                    <p>Jelajahi berbagai kategori produk kami dan temukan penawaran menarik yang siap memanjakan Anda. Di
                        [Nama Website Anda], kami tidak hanya menjual produk, tetapi juga berkomitmen untuk memberikan nilai
                        lebih bagi setiap pelanggan. Selamat berbelanja!

                        .</p>
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
                                    <a href="{{ url('produk/' . $item->slug) }}">
                                        <img src="{{ url('storage/' . $item->gambar) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a href="{{ url('produk/' . $item->slug) }}">{{ $item->judul }}</a>
                                </h5>
                                <span><b>Kategori : </b>{{ $item->kategori->nama }}</span>
                                <div class="post-date">Posted on
                                    <span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span>
                                </div>
                                <div class="post-date">
                                    <a href="{{ url('produk/' . $item->slug) }}" class="btn btn-success btn-block">
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
