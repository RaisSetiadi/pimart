<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
//route resource admin
Route::resource('/admin', \App\Http\Controllers\PostController::class)->middleware(['auth', 'verified']);;
Route::resource('/carousel', \App\Http\Controllers\CarouselController::class);
Route::get('/adminpesan', [\App\Http\Controllers\PostController::class, 'pesanan'])->name('admin.pesanan');
Route::delete('deleteposts/{id}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.destroy');

// route untuk halaman user
Route::get('/sneakers', [ViewController::class, 'sneakers'])->name('user.sneakers');
Route::get('/makanan', [ViewController::class, 'makanan'])->name('user.makanan');
Route::get('/minuman', [ViewController::class, 'minuman'])->name('user.minuman');
Route::get('/pakaian', [ViewController::class, 'pakaian'])->name('user.pakaian');
Route::get('/pants', [ViewController::class, 'pants'])->name('user.pants');
Route::get('/tshirt', [ViewController::class, 'tshirt'])->name('user.tshirt');
Route::get('/kacamata', [ViewController::class, 'kacamata'])->name('user.kacamata');
Route::get('/topi', [ViewController::class, 'topi'])->name('user.topi');
Route::get('/elektronik', [ViewController::class, 'elektronik'])->name('user.elektronik');
Route::get('/olahraga', [ViewController::class, 'olahraga'])->name('user.olahraga');
Route::get('/otomotif', [ViewController::class, 'otomotif'])->name('user.otomotif');

// route untuk melihat detail produk 
Route::get('/detailSneakers/{id}', [DetailController::class, 'sneakers'])->name('detail.sneakers');
Route::get('/detailTshirt/{id}', [DetailController::class, 'tshirt'])->name('detail.tshirt');
Route::get('/detailmakanan/{id}', [DetailController::class, 'makanan'])->name('detail.makanan');
Route::get('/detailminuman/{id}', [DetailController::class, 'minuman'])->name('detail.minuman');
Route::get('/detailpants/{id}', [DetailController::class, 'pants'])->name('detail.pants');
Route::get('/detailkacamata/{id}', [DetailController::class, 'kacamata'])->name('detail.kacamata');
Route::get('/detailtopi/{id}', [DetailController::class, 'topi'])->name('detail.topi');
Route::get('/detailelektronik/{id}', [DetailController::class, 'elektronik'])->name('detail.elektronik');
Route::get('/detailolahraga/{id}', [DetailController::class, 'olahraga'])->name('detail.olahraga');
Route::get('/detailotomotif/{id}', [DetailController::class, 'otomotif'])->name('detail.otomotif');

// route untuk pesanan
Route::post('/cekout/{id}', [PesanController::class, 'pesan'])->name('pesan.pesan');
Route::get('/checkout', [PesanController::class, 'checkout'])->name('pesan.checkout');
Route::delete('check-out/{id}', [PesanController::class, 'destroy'])->name('pesan.delete');
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi'])->name('pesan.konfirmasi');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/{id}', [HistoryController::class, 'detail'])->name('history.detail');

// route untuk search 
Route::post('/search/halamanutama', [HomeController::class, 'cari'])->name('layouts.cari');

//profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
Route::post('/profileupadate', [ProfileController::class, 'update'])->name('profile.update');
// crud pembayaran
Route::resource('/pembayaran', \App\Http\Controllers\PembayaranController::class);
