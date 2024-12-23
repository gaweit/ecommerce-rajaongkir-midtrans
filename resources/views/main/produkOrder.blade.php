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
                                    <h3 class="mb-4" align="center">Pemesanan {{ $produk->nama }}</h3>
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
                                    <form action="{{ route('produk') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Kode Pemesanan</label>
                                                    <input type="text" class="form-control" value="{{ $kodeUnik }}"
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">No Whatsapp <span style="color: red">(ingin ganti
                                                            no ?)</span></label>
                                                    <input type="text" class="form-control"
                                                        value="Nanti di isi sesuai No Whatsapp yang sedang login " readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Nama Produk</label>
                                                    <input type="text" class="form-control" value="{{ $produk->nama }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Harga Produk</label> Rp.
                                                    <input type="text" class="form-control" id="harga"
                                                        value="{{ number_format($produk->harga) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Jumlah Pemesanan</label>
                                                    <input type="number" class="form-control" name="jumlah" id="jumlah"
                                                        oninput="updateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label">Total Bayar</label>
                                                    <input type="text" class="form-control" name="total" id="total"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="produk_id"
                                                        id="produk_id" value="{{ $produk->id }}" readonly>
                                                    <input type="hidden" class="form-control" name="status" id="status"
                                                        value="Menunggu Pembayaran" readonly>
                                                    <input type="hidden" class="form-control" name="user_id" id="user_id"
                                                        value="{{ auth()->user()->id }}" readonly>
                                                    <input type="submit" value="Order Sekarang" class="btn btn-primary">
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateTotal() {
            var harga = parseFloat($('#harga').val().replace(/[^\d.-]/g, '')); // Menghapus karakter non-digit
            var jumlah = parseFloat($('#jumlah').val()) || 0;

            var total = harga * jumlah;

            // Menampilkan total dengan format rupiah
            $('#total').val(formatRupiah(total));
        }

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var formatted = ribuan.join('.').split('').reverse().join('');
            return formatted;
        }
    </script>

@endsection
