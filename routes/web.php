<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengusahaController;
use App\Http\Controllers\KategoriController;
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

//Dashboard Admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard.admin');
//Kategori
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/admin/kategori/add', [KategoriController::class, 'create'])->name('kategori.add');
Route::post('/admin/kategori/create', [KategoriController::class, 'store'])->name('kategori.create');
Route::get('/admin/kategori/edit/{id}',[KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/admin/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori.update');
Route::get('/admin/kategori/destroy/{id}',[KategoriController::class,'destroy'])->name('kategori.destroy');

Route::get('/pengusaha',[PengusahaController::class,'index'])->name('dashboard.pengusaha');

require __DIR__.'/auth.php';
