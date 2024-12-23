<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Resi {{ $record->kode }}</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .resi-container {
            border: 1px solid #000;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .company-logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="resi-container">
        <div class="header">
            <p>Resi Pengiriman {{ $record->kode }}</p>
        </div>

        {{-- <img src="https://example.com/company-logo.png" alt="Company Logo" class="company-logo"> --}}
        <h2>
            <span style="color: black">Bendo</span>
            <span style="color: red"> Arab</span>
        </h2>

        <table class="table table-bordered">
            <tr>
                <th scope="col">No Resi</th>
                <td>{{ $record->resi }}</td>
            </tr>
            <tr>
                <th scope="col">Produk</th>
                <td>{{ $record->produk->nama }}</td>
            </tr>
            <tr>
                <th scope="col">Waktu Pengiriman</th>
                <td>{{ date('d-m-Y  H:i:s') }}</td>
            </tr>
            <tr>
                <th scope="col">Penerima</th>
                <td>{{ $record->nama }}</td>
            </tr>
            <tr>
                <th scope="col">Alamat Pengiriman</th>
                <td>{{ $record->provinsi }},{{ $record->kota }},{{ $record->kecamatan }},{{ $record->alamat }},{{ $record->kode_pos }}
                </td>
            </tr>
            <!-- Tambahkan informasi lain sesuai kebutuhan -->
        </table>

        <div class="footer">
            <p>Terima kasih atas pembelian Anda</p>
        </div>
    </div>

    <!-- Menggunakan Bootstrap JS dari CDN (jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
