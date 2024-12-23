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
                                    <h3 class="mb-4" align="center"> {{ $title }} <span style="color:red;">
                                            {{ $result->kode }}</span></h3>
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

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">Kode Pemesanan</label>
                                                <input type="text" class="form-control" value="{{ $result->kode }}"
                                                    name="kode" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label">Nama Lengkap</label>
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">No Whatsapp </label>
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->nomor_whatsapp }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Nama Produk</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $result->produk->judul }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Harga Produk</label>
                                                <input type="text" class="form-control" id="harga"
                                                    value="Rp. {{ number_format($result->produk->harga) }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Alamat Tujuan Pengiriman</label>
                                                <input type="text" class="form-control" value="{{ $result->alamat }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">Ekspedisi</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $result->ekspedisi->nama }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">Kota Tujuan Pengiriman</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $result->kota->nama }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">Biaya Ongkir</label>
                                                <input type="text" class="form-control"
                                                    value="R.p {{ number_format($result->kota->biaya_ongkir) }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="label">Jumlah Pemesanan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $result->jumlah_order }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Total Bayar = Harga Produk + Biaya Ongkir</label>
                                                <input type="text" class="form-control" value="Rp. {{ $result->total }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <form action="{{ url('main/riwayat/selesai') }}/{{ $result->id }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="status" value="Diterima">
                                                <button type="submit" class="btn btn-success">Terima</button>
                                                <a href="{{ url('main/riwayat') }}" class="btn btn-danger">Kembali</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
