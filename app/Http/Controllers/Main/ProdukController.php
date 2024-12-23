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
        $origin = 151;
        $destination = 156;
        $weight = 1700;
        $courier = 'jne';
        $ongkir = $this->getOngkir($origin, $destination, $weight, $courier);
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

    function processOrder(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'ekspedisi_id' => 'required', // Sesuaikan dengan kebutuhan validasi
            'kota_id' => 'required', // Sesuaikan dengan kebutuhan validasi
            'produk_id' => 'required', // Sesuaikan dengan kebutuhan validasi
            'user_id' => 'required', // Sesuaikan dengan kebutuhan validasi
            'jumlah_order' => 'required', // Sesuaikan dengan kebutuhan validasi
            'total' => 'required', // Sesuaikan dengan kebutuhan validasi
            'status' => 'required', // Sesuaikan dengan kebutuhan validasi
            'alamat' => 'required', // Sesuaikan dengan kebutuhan validasi
            'metode' => 'required', // Sesuaikan dengan kebutuhan validasi
        ]);

        $produk = new Order;
        $produk->kode = $request->kode; // Sesuaikan dengan atribut yang sesuai
        $produk->ekspedisi_id = $request->ekspedisi_id; // Sesuaikan dengan atribut yang sesuai
        $produk->kota_id = $request->kota_id; // Sesuaikan dengan atribut yang sesuai
        $produk->produk_id = $request->produk_id; // Sesuaikan dengan atribut yang sesuai
        $produk->user_id = $request->user_id; // Sesuaikan dengan atribut yang sesuai
        $produk->jumlah_order = $request->jumlah_order;
        $produk->total = $request->total;
        $produk->alamat = $request->alamat;
        $produk->metode = $request->metode;
        $produk->status = $request->status;
        $produk->transfer = $request->transfer->store('transfer', 'public');
        $produk->save();

        if ($produk->save()) {
            return redirect('main/riwayat')->with("success", "Pemesanan Berhasil Di tambahkan ");
            // dd($produk);
        } else {
            return redirect()->back()->withInput()->withErrors("Something Error !");
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
