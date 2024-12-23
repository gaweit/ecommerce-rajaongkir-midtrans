@extends('main.layout_main')
@section('title', '')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 wrap-about">
                    <div class="img img-2 mb-4">
                        <img class="thumbnail" style="width: 100%;height:100%;"
                            src="{{ asset('storage/' . $produk['gambar']) }}" alt="">
                    </div>

                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section">
                        <div class="pl-md-5">
                            <h3 class="mb-2"><b>{{ $produk['nama'] }}</b></h3>
                        </div>
                    </div>
                    <div class="pl-md-5">
                        <p>{!! $produk['deskripsi'] !!}.</p>
                        <p>
                            <a href="{{ url('main/produk/order', $produk['slug']) }}" class="btn btn-danger"> Pesan
                                Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
