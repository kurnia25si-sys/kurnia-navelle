<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;

// Halaman utama
Route::get('/', function () {
    $produk = DB::table('produk')
        ->leftJoin('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->select(
            'produk.*',
            'kategori.nama_kategori as kategori_nama'
        )
        ->orderByDesc('produk.created_at')
        ->get();

    return view('guest.home', compact('produk'));
});

// Halaman contact
Route::get('/contact', function () {
    return view('guest.contact');
});

// Login
Route::get('/auth', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/auth', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman admin dan CRUD
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('users', UserController::class);

    Route::resource('produk', ProdukController::class);

    // CRUD kategori menggunakan Eloquent ORM
    Route::resource('kategori', KategoriController::class);
});

// Halaman hasil Query Builder produk
Route::get('/admin/produk-query', function () {
    $produk = DB::table('produk')
        ->where('stok', '>', 0)
        ->where(function ($query) {
            $query->where('harga', '>', 0)
                ->orWhereNull('harga');
        })
        ->orderBy('nama_produk')
        ->get();

    return view('admin.produk.query', compact('produk'));
})->name('produk.query');
