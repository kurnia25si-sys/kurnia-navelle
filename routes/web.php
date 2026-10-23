<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('guest.home');
});

Route::get('/contact', function () {
    return view('guest.contact');
});

Route::get('/auth', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/auth', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('users', UserController::class);

    Route::resource('produk', ProdukController::class);
});
