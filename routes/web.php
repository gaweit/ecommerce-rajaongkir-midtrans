<?php

use App\Http\Controllers\Welcome;
use App\Http\Controllers\ProdukUtama;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Main\PdfController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\CetakController;
use App\Http\Controllers\Main\ProdukController;
use App\Http\Controllers\Main\ProfileController;
use App\Http\Controllers\Main\RiwayatController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\TentangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', [Welcome::class, 'index'])->name('welcome');
Route::get('/tentang', [Welcome::class, 'tentang'])->name('tentang');
Route::get('/produk', [ProdukUtama::class, 'index'])->name('produk');
Route::get('produk/{slug}', [ProdukUtama::class, 'detil'])->name('detil');
// Route::get('produk/order/{slug}', [ProdukUtama::class, 'order'])->name('order');
Route::get('produk/order/{slug}', [ProdukUtama::class, 'order'])->name('order')->middleware('auth');
Route::post('produk', [ProdukUtama::class, 'processOrder']);


Route::redirect('/login', '/auth/login');
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'processLogin']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'processRegister']);
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('/main')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('produk/{slug}', [ProdukController::class, 'detil'])->name('detil');
    Route::get('produk/order/{slug}', [ProdukController::class, 'order'])->name('order');

    // Route::post('produk/kirimnotif/{id}', [ProdukController::class, 'kirimnotif'])->name('kirimnotif');
    // Route::post('produk/kirim_email/{id}', [ProdukController::class, 'kirim_email'])->name('kirim_email');
    Route::get('produk/order/{slug}', [ProdukController::class, 'order'])->name('order')->middleware('auth');
    Route::post('produk', [ProdukController::class, 'processOrder']);

    // riwayat
    // Route::post('/payment-notification', 'RiwayatController@paymentNotification');
    Route::post('/payment-notification', [RiwayatController::class, 'paymentNotification']);

    Route::post('riwayat/selesai/{id}', [RiwayatController::class, 'selesai'])->name('riwayat.selesai');
    Route::resource('riwayat', RiwayatController::class);
    Route::get('pdf/{order}', PdfController::class)->name('pdf');
    Route::get('cetak/{order}', CetakController::class)->name('cetak');

    // Profile
    Route::resource('profile', ProfileController::class);
    // tentang
    Route::resource('tentang', TentangController::class);
});
