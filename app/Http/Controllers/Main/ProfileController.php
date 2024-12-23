<?php

namespace App\Http\Controllers\Main;

use App\Models\User;
use App\Models\Norek;
use App\Models\Kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $norek = Norek::orderBy('id', 'desc')->get();

        // Mendapatkan ID user yang sedang login
        $userName = auth()->user()->name;

        // Mendapatkan  sesuai id user
        $user = auth()->user()->id;
        $profile = User::with('jabatan')
            ->where('id', $user)
            ->orderBy('id', 'DESC')->get();
        // Menyiapkan data untuk dikirimkan ke tampilan
        $data = [
            'icon' => 'Bendo Arab',
            'title' => "Bendo Arab || profile $userName",
            'profile' => $profile,
            'kontak' => $kontak,
            'norek' => $norek,
        ];
        return view('main.profile.index', $data);
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
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['norek'] = Norek::orderBy('id', 'desc')->get();
        $data['icon'] = "";
        $data['title'] = "Profile Edit";
        $data['result'] = User::with('jabatan')
            ->findOrFail($id);
        return view("main.profile.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = User::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->no_wa = $request->no_wa;
        $post->kecamatan = $request->kecamatan;
        $post->kota = $request->kota;
        $post->provinsi = $request->provinsi;
        $post->kode_pos = $request->kode_pos;
        $post->alamat = $request->alamat;
        $post->gender = $request->gender;
        $post->picture = $request->picture->store('picture', 'public');
        $post->save();

        return redirect('main/profile')->with('success', 'Berhasil Upload Bukti Bayar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}