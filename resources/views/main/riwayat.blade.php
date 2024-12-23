@extends('main.layout_main')
@section('title', '')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4" align="center">Riwayat Pemesanan</h3>
                                    <table id="dataTable" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Order</th>
                                                <th>Nama </th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Total Bayar</th>
                                                <th>Bukti Bayar</th>
                                                <th>Status</th>
                                                <th>Resi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $item)
                                                <tr>
                                                    <td style="text-align: center">1</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->produk->nama }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td style="width: 13%">
                                                        @if ($item->bukti == null)
                                                            <p>
                                                                <a class="btn btn-warning btn-block"
                                                                    href="/main/riwayat/{{ $item->id }}/edit">Upload</a>
                                                            </p>
                                                        @else
                                                            <a target="_blank"
                                                                href="{{ asset('storage/' . $item->bukti) }}"><img
                                                                    class="thumbnail" style="width: 100%"
                                                                    src="{{ asset('storage/' . $item->bukti) }}"
                                                                    alt=""></a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->resi }}</td>
                                                    <td style="width: 5%">
                                                        @if ($item->status == 'Dikirim')
                                                            <span>
                                                                <a class="btn btn-info btn-block"
                                                                    href="/main/riwayat/{{ $item->id }}"> Lihat</a>
                                                            </span>
                                                        @else
                                                            <form action="{{ route('riwayat.destroy', $item->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-primary btn-block"
                                                                    onclick="return confirm('Are you sure?'); return false;">Batalkan</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
