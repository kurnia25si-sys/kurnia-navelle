
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('pelanggan', PelangganController::class);

Route::resource('users', UserController::class);
