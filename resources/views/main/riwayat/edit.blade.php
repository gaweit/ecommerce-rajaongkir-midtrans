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
                                    <h3 class="mb-4" align="center"> Bayar Untuk <span style="color:red;">
                                            {{ $result->kode }}</span></h3>
                                    <p>


                                    </p>
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
                                    <form action="{{ route('riwayat.update', $result->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Kode Order</label>
                                                    <input type="text" class="form-control" value="{{ $result->kode }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Nama Lengkap</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">No Whatsapp</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $result->user->no_wa }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Nama Produk</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $result->produk->judul }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Harga Produk</label> Rp.
                                                    <input type="text" class="form-control"
                                                        value="{{ number_format($result->produk->harga) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Jumlah Pemesanan</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $result->jumlah_order }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Ongkir</label>
                                                    <input type="text" class="form-control"
                                                        value="Rp. {{ number_format($result->ongkirnya) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label"><B>Total Yang Harus Dibayar</B></label> Rp.
                                                    <input type="text" class="form-control"
                                                        value="Rp. {{ number_format($result->total) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Qris Midtrans </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="Dibayar">
                                                    <a href="{{ url('main/riwayat') }}" class="btn btn-danger">Kembali</a>
                                                    <input type="submit" value="Konfirmasi" class="btn btn-primary">
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
