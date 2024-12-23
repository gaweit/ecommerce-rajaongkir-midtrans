<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use App\Models\Slide;
use Illuminate\Http\Request;

class Welcome extends Controller
{
    function index()
    {
        // wajib
        $data['title'] = "Home";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // wajib

        $data['slide'] = Slide::orderBy('id', 'desc')->get();
        $data['produk'] = Produk::with('kategori')->take('8')->orderBy('id', 'desc')->get();
        // // dd($data);
        return view("welcome", $data);
    }
    function tentang()
    {
        // wajib
        $data['title'] = "Tentang Kami";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // wajib

        $data['slide'] = Slide::orderBy('id', 'desc')->get();
        $data['produk'] = Produk::orderBy('id', 'desc')->take('6')->get();
        // // dd($data);
        return view("tentang", $data);
    }
}
