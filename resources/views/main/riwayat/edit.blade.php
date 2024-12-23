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
                                    <h3 class="mb-4" align="center"> Upload Bukti Bayar Untuk <span style="color:red;">
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
                                                        value="{{ $result->produk->nama }}" readonly>
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
                                                    <input type="text" class="form-control" value="{{ $result->jumlah }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Sub Total</label> Rp.
                                                    <input type="text" class="form-control" id="total-input"
                                                        value="{{ number_format($result->total) }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Ongkir</label> Rp.
                                                    <input type="hidden" class="form-control" id="ongkir"
                                                        oninput="updateTotal()" value="{{ $result->ongkir }}" readonly>
                                                    <input type="text" class="form-control"
                                                        value="{{ number_format($result->ongkir) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label"><B>Total Yang Harus Dibayar</B></label> Rp.
                                                    <input type="text" class="form-control" name="bayar" id="bayar"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label">Upload Bukti Bayar</label>
                                                    <input type="file" class="form-control" name="bukti"
                                                        id="bukti">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label"><b>No Rekening Tujuan</b></label>
                                                    <table>
                                                        @foreach ($norek as $item)
                                                            <tr>
                                                                <td>{{ $item->nama }} </td>
                                                                <td> : </td>
                                                                <td>{{ $item->norek }} </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                    <hr>
                                                    <label class="label"><b>Konfirmasi Pembayaran</b></label>
                                                    <table>
                                                        @foreach ($kontak as $item)
                                                            <tr>
                                                                <td>{{ $item->wa }} </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="Dibayar">
                                                    <input type="submit" value="Konfirmasi Upload"
                                                        class="btn btn-primary">
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
        // Inisialisasi nilai total dan ongkir dari server
        var total = parseFloat('{{ $result->total }}');
        var ongkir = parseFloat('{{ $result->ongkir }}');

        function updateTotal() {
            // Ambil nilai ongkir dari input
            ongkir = parseFloat($('#ongkir').val()) || 0;

            // Perbarui nilai bayar berdasarkan total dan ongkir
            var bayar = total + ongkir;

            // Menampilkan total dengan format rupiah
            $('#bayar').val(formatRupiah(bayar));
        }

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var formatted = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + formatted;
        }

        // Panggil fungsi updateTotal saat halaman dimuat
        $(document).ready(function() {
            updateTotal();
        });

        // Panggil fungsi updateTotal saat nilai ongkir berubah
        $('#ongkir').on('input', function() {
            updateTotal();
        });
    </script>



@endsection
