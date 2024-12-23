<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Norek;

use App\Models\Slide;
use App\Models\Kontak;
use App\Models\Medsos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
    public function index()
    {
        // wajib
        $data['title'] = "Daftar Akun";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        $data['slide'] = Slide::orderBy('id', 'desc')->get();
        // wajib
        return view("auth.register", $data);
    }

    function processRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha'  // Validasi reCAPTCHA
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Pastikan untuk mengenkripsi password
        $user->nomor_whatsapp = $request->nomor_whatsapp;
        $user->kecamatan = $request->kecamatan;
        $user->kota = $request->kota;
        $user->provinsi = $request->provinsi;
        $user->kode_pos = $request->kode_pos;
        $user->alamat = $request->alamat;
        $user->gambar = $request->gambar->store('gambar', 'public');
        $user->jenis_kelamin = $request->jenis_kelamin;
        if ($user->save()) {
            return redirect()->route('login')->with("success", "Register Success");
        } else {
            return redirect()->back()->withInput()->withErrors("Something Error !");
        }
    }
}
