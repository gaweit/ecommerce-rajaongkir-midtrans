@extends('main.layout_main')
@section('title', '')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            @foreach ($profile as $item)
                <div class="row no-gutters">
                    <div class="col-md-6 wrap-about">
                        <div class="img img-2 mb-4">
                            <img class="thumbnail" style="width: 100%;" src="{{ asset('storage/' . $item->picture) }}"
                                alt="">
                        </div>

                    </div>
                    <div class="col-md-6 wrap-about ftco-animate">
                        <div class="heading-section">
                            <div class="pl-md-5">
                                {{-- <table style="width: 100%">
                                    <tr>
                                        <td>
                                            <h3>Nama</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->name }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Email</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->email }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>No. WA</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->no_wa }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Kecamatan</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->kecamatan }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Kota</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->kota }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Provinsi</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->provinsi }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Kode Pos</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->kode_pos }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Alamat</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->alamat }}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Gender</h3>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h3>{{ $item->gender }}</h3>
                                        </td>
                                    </tr>

                                </table> --}}<form action="{{ route('profile.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $item->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $item->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Nomor WhatsApp</label>
                                                <input type="text" class="form-control" name="no_wa"
                                                    value="{{ $item->no_wa }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Kecamatan</label>
                                                <input type="text" class="form-control" name="kecamatan"
                                                    value="{{ $item->kecamatan }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Kota</label>
                                                <input type="text" class="form-control" name="kota"
                                                    value="{{ $item->kota }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Provinsi</label>
                                                <input type="text" class="form-control" name="provinsi"
                                                    value="{{ $item->provinsi }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Kode Pos</label>
                                                <input type="text" class="form-control" name="kode_pos"
                                                    value="{{ $item->kode_pos }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Alamat</label>
                                                <textarea class="form-control" name="alamat">{{ $item->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="Laki-laki"
                                                        {{ $item->gender === 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ $item->gender === 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="picture">Foto Profil</label>
                                                <input type="file" class="form-control" name="picture" id="picture">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="status" value="Dibayar">
                                                <input type="submit" value="Konfirmasi Perubahan" class="btn btn-primary">
                                                <a href="{{ url('main/home') }}" class="btn btn-warning">Kembali</a>
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="pl-md-5 mt-5">
                            <p>
                                <a href="/main/profile/{{ $item->id }}/edit" class="btn btn-warning"><b>Edit</b></a>
                            </p>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
