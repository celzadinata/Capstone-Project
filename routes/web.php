<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengusahaController;
use App\Http\Controllers\KonfirmasiPaketController;
use App\Http\Controllers\ResellerControler;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ReviewController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Role Admin taro sini
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    //Dashboard Admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.admin');
    //Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/add', [KategoriController::class, 'create'])->name('kategori.add');
    Route::post('/kategori/create', [KategoriController::class, 'store'])->name('kategori.create');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    // User Management
    Route::get('/user_management', [UserController::class, 'index'])->name('user.admin');
    Route::get('/user_management/confrim/{id}', [UserController::class, 'edit'])->name('confirm_user.admin');
    Route::put('/user_management/update/{id}', [UserController::class, 'update'])->name('update_user.admin');
    Route::get('/user_management/destory/{id}', [UserController::class, 'destroy'])->name('destroy_user.admin');
    //  Konfirmasi Produk
    Route::get('/konfirmasi_produk', [KonfirmasiPaketController::class, 'index'])->name('konfirmasi.admin');
});

//Role Pengusaha taro sini
Route::group(['prefix' => 'pengusaha', 'middleware' => ['auth', 'isPengusaha']], function () {
    Route::get('/', [PengusahaController::class, 'index'])->name('dashboard.pengusaha');
    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.pengusaha');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    // Transaksi
    Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi.pengusaha');
    Route::put('/transaksi/update/{id}',[TransaksiController::class,'update'])->name('transaksi.update');
    // Route::get('/transaksi/pdf/{id}',[TransaksiController::class,'showPDF'])->name('transaksi.pdf');
    
    //Laporan
    Route::get('/laporan',[LaporanController::class,'index'])->name('laporan.pengusaha');
    //Review
    Route::get('/review',[ReviewController::class,'index'])->name('review.pengusaha');
    Route::put('/review/update/{id}',[ReviewController::class,'update'])->name('review.update');
    
});

//Role Reseller taro sini
Route::group(['prefix' => 'reseller', 'middleware' => ['auth', 'isReseller']], function () {
    Route::get('/', [ResellerControler::class, 'index'])->name('dashboard.reseller');
});

require __DIR__ . '/auth.php';
