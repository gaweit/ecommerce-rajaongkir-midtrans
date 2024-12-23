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
                                    <h3 class="mb-4" align="center">Pemesanan {{ $produk->nama }}</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4"><br></div>
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
                                            <div class="col-md-3">
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
                                                    <input type="text" class="form-control" value="{{ $produk->judul }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label">Harga Produk</label> Rp. / Kg
                                                    <input type="text" class="form-control" id="harga"
                                                        value="{{ number_format($produk->harga) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label">Alamat Tujuan Pengiriman</label>
                                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Jumlah Pemesanan</label>
                                                    <input type="number" class="form-control" name="jumlah_order"
                                                        id="jumlah" oninput="updateTotal()" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Kota Tujuan Pengiriman</label>
                                                    <select name="destination" id="destination" class="form-control select2"
                                                        onchange="updateOngkir()">
                                                        <option value=""></option>
                                                        @foreach ($kota as $item)
                                                            <option value="{{ $item['city_id'] }}">
                                                                {{ $item['city_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Kurir</label>
                                                    <select name="courier" id="courier" class="form-control select2"
                                                        onchange="updateOngkir()">
                                                        <option value=""></option>
                                                        <option value="jne">JNE</option>
                                                        <option value="pos">POS</option>
                                                        <option value="tiki">TIKI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="produk_id"
                                                        id="produk_id" value="{{ $produk->id }}" readonly>
                                                    <input type="hidden" class="form-control" name="status" id="status"
                                                        value="Pending" readonly>
                                                    <input type="hidden" class="form-control" name="user_id"
                                                        id="user_id" value="{{ auth()->user()->id }}" readonly>

                                                    <input type="hidden" class="form-control" name="weight"
                                                        value="1">
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
        function updateOngkir() {
            var ongkir = parseFloat($('#kota_id option:selected').data('ongkir')) || 0;
            $('#ongkir').val(ongkir);
            updateTotal();
        }

        function updateTotal() {
            var harga = parseFloat($('#harga').val().replace(/[^\d.-]/g, '')) || 0;
            var ongkir = parseFloat($('#ongkir').val()) || 0;
            var jumlah = parseFloat($('#jumlah').val()) || 0;
            // Ongkir total = ongkir per produk * jumlah pemesanan
            var totalOngkir = ongkir * jumlah;

            // Hitung total bayar = harga produk * jumlah + total ongkir
            var total = (harga * jumlah) + totalOngkir;
            // var total = (harga * jumlah) + ongkir;

            // Menampilkan total dengan format rupiah
            $('#total').val(formatRupiah(total));
        }

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var formatted = ribuan.join('.').split('').reverse().join('');
            return formatted;
        }

        // Inisialisasi ongkir dan total saat halaman dimuat
        $(document).ready(function() {
            updateOngkir(); // Set ongkir default saat halaman dimuat
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Event listener for select change
            $('#metode').on('change', function() {
                var metode = $(this).val();

                // Show or hide Bukti Transfer input based on selected method
                if (metode === 'TRANSFER') {
                    $('#buktiTransferDiv').show(); // Show Bukti Transfer if TRANSFER is selected
                } else {
                    $('#buktiTransferDiv').hide(); // Hide Bukti Transfer if COD is selected
                }
            });

            // Trigger change event on page load to set initial visibility
            $('#metode').trigger('change');
        });
    </script>
@endsection
