@extends('layout')
@section('title', 'Pembayaran')
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
                                    <form action="{{ route('riwayat.update', $result->id) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <!-- Other form fields for order details -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label"><B>Total Yang Harus Dibayar</B></label> Rp.
                                                    <input type="text" class="form-control"
                                                        value="Rp. {{ number_format($result->total) }}" readonly>
                                                </div>
                                            </div>

                                            <!-- Button for Midtrans Payment -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="status" value="Dibayar">
                                                    <a href="{{ url('main/riwayat') }}" class="btn btn-danger">Kembali</a>
                                                    <button type="button" id="pay-button" class="btn btn-primary">Bayar
                                                        Sekarang</button>
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

    <!-- Include Midtrans Snap Script -->
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil");
                    window.location.href = "{{ url('main/riwayat') }}";
                },
                onPending: function(result) {
                    alert("Pembayaran pending");
                    window.location.href = "{{ url('main/riwayat') }}";
                },
                onError: function(result) {
                    alert("Pembayaran gagal");
                    window.location.href = "{{ url('main/riwayat') }}";
                }
            });
        };
    </script>
@endsection
