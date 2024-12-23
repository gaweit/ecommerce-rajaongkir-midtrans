@extends('layout')
@section('title', '')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4" align="center">{{ $title }}</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        <br>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                                        </div>
                                    @endif
                                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Nama Lengkap" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nomor_whatsapp">Nomor WhatsApp</label>
                                                    <input type="text" class="form-control" name="nomor_whatsapp"
                                                        id="nomor_whatsapp" placeholder="Nomor WhatsApp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="kecamatan">Kecamatan</label>
                                                    <input type="text" class="form-control" name="kecamatan"
                                                        id="kecamatan" placeholder="Kecamatan" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="kota">Kota</label>
                                                    <input type="text" class="form-control" name="kota" id="kota"
                                                        placeholder="Kota" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="provinsi">Provinsi</label>
                                                    <input type="text" class="form-control" name="provinsi"
                                                        id="provinsi" placeholder="Provinsi" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="kode_pos">Kode Pos</label>
                                                    <input type="text" class="form-control" name="kode_pos"
                                                        id="kode_pos" placeholder="Kode Pos" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="gambar">Foto Profil</label>
                                                    <input type="file" class="form-control" name="gambar"
                                                        id="gambar" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                                        required>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        <option value="other">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Google reCAPTCHA v2 -->
                                            <div class="col-md-6 mb-3">
                                                <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" value="Register" class="btn btn-primary">
                                                    <a href="{{ url('/auth/login') }}" class="btn btn-secondary">Sudah
                                                        Punya Akun ?</a>
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- reCAPTCHA Script --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
