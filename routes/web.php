<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengusahaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResellerControler;
use App\Http\Controllers\ProdukController;

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
});

//Role Pengusaha taro sini
Route::group(['prefix' => 'pengusaha', 'middleware' => ['auth', 'isPengusaha']], function () {
    Route::get('/', [PengusahaController::class, 'index'])->name('dashboard.pengusaha');

    //Produk
Route::get('/pengusaha/produk', [ProdukController::class, 'index'])->name('produk.pengusaha');
Route::get('/pengusaha/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/pengusaha/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/pengusaha/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/pengusaha/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/pengusaha/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

//Role Reseller taro sini
Route::group(['prefix' => 'reseller', 'middleware' => ['auth', 'isReseller']], function () {
    Route::get('/', [ResellerControler::class, 'index'])->name('dashboard.reseller');

});

require __DIR__ . '/auth.php';
