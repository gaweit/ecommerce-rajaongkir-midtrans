<?php

namespace App\Http\Controllers;

use App\Models\Norek;
use App\Models\Order;
use App\Models\Slide;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukUtama extends Controller
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

        return view("produk", $data);
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

        return view('produkDetail', $data);
    }

    // public function order($slug)
    // {
    //     $kontak = Kontak::orderBy('id', 'desc')->get();
    //     $norek = Norek::orderBy('id', 'desc')->get();
    //     // Mendapatkan ID user yang sedang login
    //     $userId = Auth::id();

    //     // Mendapatkan produk berdasarkan slug
    //     $produk = Produk::with('kategori')->where('slug', $slug)->first();

    //     // Menghasilkan kode unik
    //     $kodeUnik = $this->generateUniqueCode('ORDER', 8);

    //     // Menyiapkan data untuk dikirimkan ke tampilan
    //     $data = [
    //         'userId' => $userId,
    //         'icon' => 'Hokifrozenmart',
    //         'kategori' => Kategori::all(),
    //         'title' => "Produk $slug",
    //         'produk' => $produk,
    //         'norek' => $norek,
    //         'kontak' => $kontak,
    //         'kodeUnik' => $kodeUnik, // Menambahkan kode unik ke data
    //     ];

    //     return view('produkOrder', $data);
    // }

    // function generateUniqueCode($prefix = '', $length = 8)
    // {
    //     // Menetapkan prefix ke kode (jika ada)
    //     $code = $prefix;

    //     // Menetapkan panjang sisa kode yang harus di-generate
    //     $remainingLength = $length - strlen($prefix);

    //     // Menghasilkan karakter random dengan panjang sisa kode
    //     $randomPart = Str::random($remainingLength);

    //     // Menggabungkan prefix dan karakter random untuk mendapatkan kode lengkap
    //     $code .= $randomPart;

    //     return $code;
    // }

    // function processOrder(Request $request)
    // {
    //     $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
    //     $data['norek'] = Norek::orderBy('id', 'desc')->get();
    //     $request->validate([
    //         'kode' => 'required',
    //         'produk_id' => 'required', // Sesuaikan dengan kebutuhan validasi
    //         'user_id' => 'required', // Sesuaikan dengan kebutuhan validasi
    //         'jumlah' => 'required', // Sesuaikan dengan kebutuhan validasi
    //         'total' => 'required', // Sesuaikan dengan kebutuhan validasi
    //         'status' => 'required', // Sesuaikan dengan kebutuhan validasi
    //     ]);

    //     $produk = new Order;
    //     $produk->kode = $request->kode; // Sesuaikan dengan atribut yang sesuai
    //     $produk->produk_id = $request->produk_id; // Sesuaikan dengan atribut yang sesuai
    //     $produk->user_id = $request->user_id; // Sesuaikan dengan atribut yang sesuai
    //     $produk->jumlah = $request->jumlah;
    //     $produk->total = $request->total;
    //     $produk->status = $request->status;
    //     $produk->save();
    //     if ($produk->save()) {
    //         // return redirect()->route('riwayat')->with("success", "Register Success");
    //         dd($produk);
    //     } else {
    //         return redirect()->back()->withInput()->withErrors("Something Error !");
    //     }
    // }
}