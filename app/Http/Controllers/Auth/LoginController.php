<?php

namespace App\Http\Controllers\Auth;

use App\Models\Norek;
use App\Models\Kontak;
use App\Models\Medsos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
// use Auth;

class LoginController extends Controller
{
    function index()
    {
        // wajib
        $data['title'] = "Login";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['medsos'] = Medsos::orderBy('id', 'desc')->get();
        $data['slide'] = Slide::orderBy('id', 'desc')->get();
        // wajib
        return view('auth.login', $data);
    }

    function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'g-recaptcha-response' => 'required|captcha'  // Validasi reCAPTCHA
        ]);
        $credential = ['email' => $request->email, 'password' => $request->password];
        $login = Auth::attempt($credential);
        if ($login) {
            // dd(Auth::check());
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->withErrors("Ets anda mau ngapain ?");
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
        // return redirect()->route('login');
    }
}
