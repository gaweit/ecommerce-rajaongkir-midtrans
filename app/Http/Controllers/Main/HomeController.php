<?php

namespace App\Http\Controllers\Main;

use App\Models\Norek;
use App\Models\Slide;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        // dd($data);
        return view("main.home", $data);
    }
}
