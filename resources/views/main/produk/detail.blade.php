@extends('layout')
@section('title', '')
@section('content')


    <div class="page-section pt-5">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb p-0 mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('produk') }}">Produk</a></li>
                    <li class="breadcrumb-item active">{{ $produk->judul }}</li>
                </ul>
            </nav>

            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrap">
                        <div class="header">
                            <img style="width: 100%" src="{{ url('storage/' . $produk->gambar) }}" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <!-- Widget search -->
                        <div class="widget-box">
                            <h4>{{ $produk->judul }}</h4>
                            <p><b>Kategori : </b>{{ $produk->kategori->nama }} <br>Rp. {{ number_format($produk->harga) }}
                            </p>
                            <div class="post-date">Deskripsi:
                                <p>{!! $produk->deskripsi !!}</p>
                            </div>
                            <div class="post-date">Posted on
                                <span>{{ date('d-m-Y', strtotime($produk->updated_at)) }}</span>
                            </div>

                            <a href="{{ url('main/produk/order/' . $produk->slug) }}" class="btn btn-primary btn-block">
                                <i class="mai-cart"></i>
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
