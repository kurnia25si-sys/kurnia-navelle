
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('pelanggan', PelangganController::class);

Route::resource('users', UserController::class);
