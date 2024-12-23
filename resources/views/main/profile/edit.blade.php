@extends('main.layout_main')
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
                                    <h3 class="mb-4" align="center"> Edit Profile <span style="color:red;">
                                            {{ $result->name }}</span></h3>
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
                                    <form action="{{ route('profile.update', $result->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $result->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $result->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Nomor WhatsApp</label>
                                                    <input type="text" class="form-control" name="no_wa"
                                                        value="{{ $result->no_wa }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Kecamatan</label>
                                                    <input type="text" class="form-control" name="kecamatan"
                                                        value="{{ $result->kecamatan }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Kota</label>
                                                    <input type="text" class="form-control" name="kota"
                                                        value="{{ $result->kota }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Provinsi</label>
                                                    <input type="text" class="form-control" name="provinsi"
                                                        value="{{ $result->provinsi }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Kode Pos</label>
                                                    <input type="text" class="form-control" name="kode_pos"
                                                        value="{{ $result->kode_pos }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Alamat</label>
                                                    <textarea class="form-control" name="alamat">{{ $result->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option value="Laki-laki"
                                                            {{ $result->gender === 'Laki-laki' ? 'selected' : '' }}>
                                                            Laki-laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            {{ $result->gender === 'Perempuan' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="picture">Foto Profil</label>
                                                    <input type="file" class="form-control" name="picture"
                                                        id="picture">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="Dibayar">
                                                    <input type="submit" value="Konfirmasi Perubahan"
                                                        class="btn btn-primary">
                                                    <a href="{{ url('main/profile') }}"
                                                        class="btn btn-warning">Kembali</a>
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
