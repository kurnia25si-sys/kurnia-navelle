
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('pelanggan', PelangganController::class);
