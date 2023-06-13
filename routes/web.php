<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResellerControler;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengusahaController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\KonfirmasiPaketController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ReviewController;

use App\Http\Livewire\Cart;

use GuzzleHttp\Client;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Role Admin
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
    Route::get('/user_management/confirm/{id}', [UserController::class, 'edit'])->name('confirm_user.admin');
    Route::put('/user_management/update/{id}', [UserController::class, 'update'])->name('update_user.admin');
    Route::get('/user_management/destory/{id}', [UserController::class, 'destroy'])->name('destroy_user.admin');
    //  Konfirmasi Produk
    Route::get('/konfirmasi-produk', [KonfirmasiPaketController::class, 'index'])->name('konfirmasi.admin');
    Route::get('/konfirmasi-produk/confirm/{id}', [KonfirmasiPaketController::class, 'edit'])->name('konfirmasi_paket.admin');
    Route::put('/konfirmasi-produk/confirm/{id}', [KonfirmasiPaketController::class, 'update'])->name('update_paket.admin');
    Route::get('/konfirmasi-produk/destory/{id}', [KonfirmasiPaketController::class, 'destroy'])->name('konfirmasi_destroy.admin');
    // Notifikasi atau pesan
    Route::post('/konfirmasi_produk/pesan_tolak', [NotifikasiController::class, 'store'])->name('pesan_paket.admin');
});

//Role Pengusaha
Route::group(['prefix' => 'pengusaha', 'middleware' => ['auth', 'isPengusaha']], function () {
    Route::get('/', [PengusahaController::class, 'index'])->name('dashboard.pengusaha');
    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.pengusaha');
    Route::get('/produk/jenis', [ProdukController::class, 'jenis'])->name('produk.jenis');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::put('/produk/update_tampilan/{id}', [ProdukController::class, 'update_tampilan'])->name('produk.update_tampilan');
    Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.pengusaha');
    Route::put('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/{id}/print', [ResellerControler::class, 'invoice'])->name('invoice');
    //Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.pengusaha');
    //Review
    Route::get('/review', [ReviewController::class, 'index'])->name('review.pengusaha');
    Route::put('/review/update/{id}', [ReviewController::class, 'update'])->name('review.update');
    //Profile
    Route::get('/profile', [PengusahaController::class, 'show'])->name('pengusaha.profile');
    Route::put('/profile', [PengusahaController::class, 'update'])->name('pengusaha.profile.update');
});

//Role Reseller
Route::group(['prefix' => 'reseller', 'middleware' => ['auth', 'isReseller']], function () {
    // Dashboard Reseller
    Route::get('/', [ResellerControler::class, 'index'])->name('reseller');
    // Semua Kategori
    Route::get('/kategori', [ResellerControler::class, 'kategori'])->name('kategori.reseller');
    Route::get('/kategori/{id}', [ResellerControler::class, 'produk_kategori'])->name('produk_kategori.reseller');
    // Paket Usaha
    Route::get('/produk', [ResellerControler::class, 'produk'])->name('produk.reseller');
    Route::get('/produk_detail/{slug}', [ResellerControler::class, 'produk_detail'])->name('produk_detail.reseller');
    Route::get('/produk-detail/{id}', [ResellerControler::class, 'produk_detail'])->name('produk_detail.reseller');
    // Profile
    Route::get('/profile', [ResellerControler::class, 'profile'])->name('profile.reseller');
    Route::put('/profile', [ResellerControler::class, 'profile_update'])->name('update.profile.reseller');
    // Keranjang
    Route::get('/keranjang', Cart::class)->name('keranjang');
    Route::post('/keranjang', [TransaksiController::class, 'store'])->name('keranjang.checkout');
    Route::get('/add/{id}', [DetailTransaksiController::class, 'store'])->name('keranjang.add');
    // pesanan saya
    Route::get('/user/pesanan-saya', [ResellerControler::class, 'indexPesanan'])->name('pesanan.saya');
    Route::put('/user/pesanan-saya/update/{id}', [ResellerControler::class, 'konfirmasiPesanan'])->name('pesanan.update');
    // Invoice
    Route::get('/{id}/print', [ResellerControler::class, 'invoice'])->name('invoice.print');
});



// Guets
// Dashboard Reseller
Route::get('/', [ResellerControler::class, 'index'])->name('dashboard.reseller');
// Semua Kategori
Route::get('/kategori', [ResellerControler::class, 'kategori'])->name('kategori.reseller');
Route::get('/kategori/{id}', [ResellerControler::class, 'produk_kategori'])->name('produk_kategori.reseller');
// Paket Usaha
Route::get('/produk', [ResellerControler::class, 'produk'])->name('produk.reseller');
Route::get('/produk_detail/{slug}', [ResellerControler::class, 'produk_detail'])->name('produk_detail.reseller');
// search produk
Route::get('/search', [ResellerControler::class, 'search'])->name('search');


require __DIR__ . '/auth.php';
