<?php

namespace App\Http\Controllers\Main;

use App\Models\Norek;
use App\Models\Order;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan ID user yang sedang login
        $userId = auth()->user()->name;
        // wajib
        $title = "Riwayat Order $userId";
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $medsos = Medsos::orderBy('id', 'desc')->get();
        // wajib


        // Mendapatkan orderan sesuai id user
        $user = auth()->user()->id;
        $order = Order::with('user', 'produk', 'kota', 'ekspedisi')
            ->where('user_id', $user)
            ->orderBy('id', 'DESC')->get();
        // Menyiapkan data untuk dikirimkan ke tampilan
        $data = [
            'kategori' => Kategori::all(),
            'title' => $title,
            'order' => $order,
            'kontak' => $kontak,
            'medsos' => $medsos,
        ];
        return view('main.riwayat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Wajib
        $data['title'] = "Tanda Produk Diterima";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // Wajib
        $data['result'] = Order::with('user', 'produk')
            ->findOrFail($id);
        return view("main.riwayat.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // wajib
        $userId = auth()->user()->name;
        $data['title'] = "Bayar $userId";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // wajib
        $data['result'] = Order::with('user', 'produk')
            ->findOrFail($id);
        return view("main.riwayat.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Order::find($id);
        $post->status = $request->status;
        $post->bukti = $request->bukti->store('bukti', 'public');
        $post->save();

        return redirect('main/riwayat')->with('success', 'Berhasil Upload Bukti Bayar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('delete', 'Pemesanan Berhasil di Batalkan!');
    }

    function selesai(Request $request, string $id)
    {
        $post = Order::find($id);
        $post->status = $request->status;
        $post->save();

        return redirect('main/riwayat')->with('success', 'Terimakasih ,Sudah berbelanja di tempat kami !');
    }
}
