<?php

namespace App\Http\Controllers\Main;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Norek;
use App\Models\Order;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use App\Models\Kategori;
use Midtrans\Transaction;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $userId = auth()->user()->name;
        $data['title'] = "Bayar $userId";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        $data['result'] = Order::with('user', 'produk')->findOrFail($id);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        // Menambahkan konfigurasi cURL untuk menonaktifkan verifikasi SSL
        Config::$curlOptions = [
            CURLOPT_SSL_VERIFYPEER => false,
        ];

        $order = $data['result'];

        $transaction_details = [
            'order_id' => $order->kode,  // Menggunakan kode order sebagai ID transaksi
            'gross_amount' => $order->total,  // Total harga yang harus dibayar
        ];

        // Data pengiriman ke Midtrans
        $customer_details = [
            'first_name'    => $order->user->name,
            'email'         => $order->user->email,
            'phone'         => $order->user->no_wa,
        ];

        $item_details = [
            [
                'id' => $order->produk->id,
                'price' => $order->produk->harga,
                'quantity' => $order->jumlah_order,
                'name' => $order->produk->judul
            ]
        ];

        $payment_data = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        // Mengambil token Midtrans
        try {
            $snap_token = Snap::getSnapToken($payment_data);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("Pembayaran gagal: " . $e->getMessage());
        }

        // Menambahkan token ke dalam data view
        $data['snap_token'] = $snap_token;

        return view('main.riwayat.edit', $data);
    }
    public function paymentNotification(Request $request)
    {
        // Debugging untuk melihat seluruh data yang diterima dari Midtrans
        Log::info('Payment Notification:', $request->all());
        dd($request->all());  // Menampilkan semua data yang diterima

        // Inisialisasi Notification dengan data request
        $notification = new Notification($request->all());

        // Melanjutkan proses yang ada
        $status = $notification->transaction_status;
        // $order_id = $notification->order_id;
        $order_id = $notification->order_id ?? 'unknown';  // Jika order_id tidak ada, gunakan default 'unknown'

        $fraud_status = $notification->fraud_status;

        // Update order status based on the transaction result
        $order = Order::find($order_id);

        if ($status == 'capture' && $fraud_status == 'accept') {
            $order->status = 'Dibayar';
        } elseif ($status == 'settlement') {
            $order->status = 'Dibayar';
        } else {
            $order->status = 'Gagal';
        }

        $order->save();
        return response()->json(['status' => 'success']);
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
