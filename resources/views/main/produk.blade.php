@extends('main.layout_main')
@section('title', '')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach ($produk as $item)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ url('main/produk', $item->slug) }}" class="block-20 rounded">
                                <img style="width: 100%" src="{{ asset('storage/' . $item->gambar) }}" alt="">
                            </a>
                            <div class="text p-4 text-center">
                                <h3 class="heading"><a href="{{ url('main/produk', $item->slug) }}">{{ $item->nama }}</a>
                                </h3>
                                <div class="meta mb-2">
                                    <div><a
                                            href="{{ url('main/produk', $item->slug) }}">{{ date('d-m-Y', strtotime($item->created_at)) }}</a>
                                    </div>
                                    <div><a href="{{ url('main/produk', $item->slug) }}">Admin</a></div>
                                </div>
                                <p>
                                    {{-- {{ Str::limit($item->deskripsi, 45) }} --}}
                                    {{ Str::limit(strip_tags($item->deskripsi), 45) }}

                                <p><a href="{{ url('main/produk', $item->slug) }}">Klik Gambar untuk Melihat
                                        detail</a></p>
                                <p><a href="{{ url('main/produk', $item->slug) }}" class="btn btn-primary">Order</a></p>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            {{-- <li class="#"><span>{{ $nomor->berita_id }}</span></li> --}}
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
