@extends('layout')
@section('content')
    <div class="container">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="Password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <!-- Google reCAPTCHA v2 -->
                        <div class="col-md-12 mb-3">
                            <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" value="{{ date('Y-m-d') }}" name="tanggal">
                                <input type="submit" value="Login" class="btn btn-primary">
                                <a href="{{ url('/auth/register') }}" class="btn btn-secondary">Belum
                                    Punya Akun ?</a>
                                <div class="submitting"></div>
                            </div>
                        </div>
                    </form>
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
            <a href="#kontak" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
        </div>
    </div>
    </header>
@endsection

{{-- reCAPTCHA Script --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
