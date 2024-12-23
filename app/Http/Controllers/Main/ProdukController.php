<?php

namespace App\Http\Controllers\Main;

use App\Models\Kota;
use App\Models\User;
use App\Models\Norek;
use App\Models\Order;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use GuzzleHttp\Client;
use App\Mail\SendEmail;
use App\Models\Kategori;
use App\Models\Ekspedisi;
use App\Traits\WablasTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProdukController extends Controller
{
    function index(Request $request)
    {
        // Wajib
        $data['title'] = "Produk Kami";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // Wajib

        // Ambil semua kategori untuk filter
        $data['kategori'] = Kategori::all();

        // Ambil produk dengan pencarian dan filter
        $produkQuery = Produk::with('kategori');

        // Pencarian berdasarkan judul produk
        if ($request->has('search')) {
            $produkQuery->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $produkQuery->whereHas('kategori', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }

        // Paginasi dengan 9 produk per halaman
        $data['produk'] = $produkQuery->orderBy('id', 'desc')->paginate(8);
        return view('main.produk.index', $data);
    }

    public function detil($slug)
    {
        // Wajib
        $data['title'] = "Produk Kami $slug";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // Wajib
        $data['produk'] =  Produk::with('kategori')
            ->where('slug', $slug)->first();

        return view('main.produk.detail', $data);
    }

    public function order($slug)
    {
        // Wajib
        $title  = "Produk Kami $slug";
        $norek = Kontak::where('nama', '=', 'NOREK')->orderBy('id', 'desc')->get();
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $medsos = Medsos::orderBy('id', 'desc')->get();
        // $kota = Kota::orderBy('id', 'desc')->get();
        $ekspedisi = Ekspedisi::orderBy('id', 'desc')->get();
        // Wajib
        // Mendapatkan ID user yang sedang login
        $userId = Auth::user();

        // Mendapatkan produk berdasarkan slug
        $produk = Produk::with('kategori')->where('slug', $slug)->first();

        // Menghasilkan kode unik
        $kodeUnik = $this->generateUniqueCode('ORDER', 8);
        // $ongkir = $this->getOngkir($origin, $destination, $weight, $courier);
        $asalkota = $this->getAsalKota();
        // dd($asalkota);
        $kota = $this->getKota();

        // Menyiapkan data untuk dikirimkan ke tampilan
        $data = [
            'userId' => $userId,
            'icon' => '',
            'kategori' => Kategori::all(),
            'title' => $title,
            'produk' => $produk,
            'kodeUnik' => $kodeUnik,
            'kontak' => $kontak,
            'norek' => $norek,
            'medsos' => $medsos,
            'cities' => $asalkota['cities'], // Menggunakan 'cities' yang berisi daftar kota
            'defaultCity' => $asalkota['default_city'],
            'kota' => $kota,
            'ekspedisi' => $ekspedisi,
        ];

        return view('main.produk.order', $data);
    }

    function generateUniqueCode($prefix = '', $length = 8)
    {
        // Menetapkan prefix ke kode (jika ada)
        $code = $prefix;

        // Menetapkan panjang sisa kode yang harus di-generate
        $remainingLength = $length - strlen($prefix);

        // Menghasilkan karakter random dengan panjang sisa kode
        $randomPart = Str::random($remainingLength);

        // Menggabungkan prefix dan karakter random untuk mendapatkan kode lengkap
        $code .= $randomPart;

        return $code;
    }
    public function processOrder(Request $request)
    {
        // Validasi input yang diterima
        $request->validate([
            'kode' => 'required',
            'destination' => 'required', // Tujuan pengiriman (ID kota tujuan)
            'weight' => 'required', // Berat barang (gram)
            'courier' => 'required', // Ekspedisi (kurir)
            'produk_id' => 'required', // ID produk yang dipesan
            'user_id' => 'required', // ID pengguna yang memesan
            'jumlah_order' => 'required', // Jumlah produk yang dipesan
            'status' => 'required', // Status pesanan (pending, confirmed, etc.)
            'alamat' => 'required', // Alamat pengiriman
        ]);

        // Ambil produk berdasarkan ID yang dipilih
        $produk = Produk::find($request->produk_id);
        // Hitung total berat berdasarkan jumlah produk yang dipesan
        $totalBerat = $request->weight; // Berat total (gram)
        $origin = 206; // Berat total (gram)

        // Ambil biaya ongkir menggunakan API RajaOngkir
        $ongkir = $this->getOngkir($origin, $request->destination, $totalBerat, $request->courier);

        // Ambil biaya ongkir terendah
        $biayaOngkir = $ongkir[0]['cost'][0]['value']; // Misalnya, menggunakan biaya pertama

        // Simpan data pemesanan ke tabel 'order'
        $order = new Order;
        $order->kode = $request->kode;
        $order->origin = $origin; // Kota asal pengiriman
        $order->destination = $request->destination; // Kota tujuan pengiriman
        $order->weight = $totalBerat; // Berat total barang dalam gram
        $order->courier = $request->courier; // Ekspedisi (kurir)
        $order->ongkirnya = $biayaOngkir; // Ekspedisi (kurir)
        $order->produk_id = $request->produk_id; // ID produk yang dipesan
        $order->user_id = $request->user_id; // ID pengguna yang memesan
        $order->jumlah_order = $request->jumlah_order; // Jumlah produk yang dipesan
        $order->alamat = $request->alamat; // Alamat pengiriman
        $order->status = $request->status; // Status pemesanan (pending, confirmed, etc.)
        $order->total = $produk->harga * $request->jumlah_order + $biayaOngkir; // Total harga produk + ongkir
        $order->save();

        // Jika pemesanan berhasil disimpan
        if ($order->save()) {
            return redirect('main/riwayat')->with("success", "Pemesanan Berhasil Ditambahkan!");
        } else {
            // Jika terjadi error saat penyimpanan
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan!");
        }
    }

    public function getAsalKota()
    {
        $client = new Client(['verify' => false]); // Abaikan verifikasi SSL

        $response = $client->get('https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

        $body = json_decode($response->getBody(), true);

        $cities = $body['rajaongkir']['results'];

        // Cari kota default dengan city_id: 206
        $defaultCity = collect($cities)->firstWhere('city_id', 206);

        return [
            'cities' => $cities,
            'default_city' => $defaultCity,
        ];
    }


    public function getKota()
    {
        $client = new Client([
            'verify' => false, // Abaikan verifikasi SSL
        ]);

        $response = $client->get('https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

        $body = json_decode($response->getBody(), true);

        // Mengembalikan semua kota
        return $body['rajaongkir']['results'];
    }

    public function getOngkir($origin, $destination, $weight, $courier)
    {
        $client = new Client([
            'verify' => false, // Abaikan verifikasi SSL
        ]);
        $response = $client->post('https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body['rajaongkir']['results'][0]['costs'];
    }
}
