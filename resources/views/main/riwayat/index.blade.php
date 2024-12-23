@extends('layout')
@section('title', '')
@section('content')
    <div class="container mb-3">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    </header>
    <br>
    <div class="container mb-3">
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
        <div class="table-responsive">
            <table id="dataTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama </th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Ongkir/Kg</th>
                        <th>Total</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $index => $item)
                        <tr>
                            <td style="text-align: center">{{ $index + 1 }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->produk->judul }}</td>
                            <td>{{ $item->jumlah_order }} Kg</td>
                            <td>Rp.{{ $item->produk->harga }}</td>
                            <td>Rp.{{ number_format($item->kota->biaya_ongkir) }}</td>
                            <td>Rp.{{ $item->total }}</td>
                            <td>{{ $item->metode }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->status == 'Diproses' || $item->status == 'Dikirim')
                                    <a class="btn btn-warning" href="/main/riwayat/{{ $item->id }}">Detail </a>
                                @elseif ($item->status == 'Diterima')
                                    <a class="btn btn-info" href="#">Selesai</a>
                                @else
                                    <form action="{{ route('riwayat.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Batalkan</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>

@endsection
