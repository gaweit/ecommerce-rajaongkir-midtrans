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
    <!-- Blog -->
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <form action="{{ url()->current() }}" method="GET" class="form-search-blog">
                        <div class="input-group">
                            <div class="input-group-prepend col-lg-3">
                                <select name="category" id="categories" class="custom-select bg-light">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($kategori as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ request('category') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group-prepend col-lg-8">
                                <input type="text" name="search" class="form-control" placeholder="Cari Produk.."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="input-group-prepend col-lg-1">
                                <button type="submit" class="btn btn-secondary">Cari</button> &nbsp;
                                <a href="{{ url()->current() }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row my-5">
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
            </div>

            <nav aria-label="Page Navigation">
                <ul class="pagination justify-content-center">
                    <!-- Previous Page Link -->
                    @if ($produk->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $produk->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @for ($page = 1; $page <= $produk->lastPage(); $page++)
                        <li class="page-item {{ $page == $produk->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $produk->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    <!-- Next Page Link -->
                    @if ($produk->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $produk->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>


        </div>
    </div>
@endsection
