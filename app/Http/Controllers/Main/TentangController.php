<?php

namespace App\Http\Controllers\Main;

use App\Models\Slide;
use App\Models\Kontak;
use App\Models\Medsos;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // wajib
        $data['title'] = "Tentang Kami";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        // wajib

        $data['slide'] = Slide::orderBy('id', 'desc')->get();
        $data['produk'] = Produk::orderBy('id', 'desc')->take('6')->get();
        // // dd($data);
        return view("tentang.index", $data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
