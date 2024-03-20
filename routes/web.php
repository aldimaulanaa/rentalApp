<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\AuthController;

// Rute untuk halaman registrasi pengguna
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk halaman login pengguna
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk keluar dari sesi pengguna
Route::post('/logout', [AuthController::class, 'logout']);

// Rute untuk halaman peminjaman mobil
Route::get('/rentals/create', [RentalController::class, 'create']);
Route::post('/rentals', [RentalController::class, 'store']);

// Rute untuk halaman pengembalian mobil
Route::get('/returns/create', [ReturnController::class, 'create']);
Route::post('/returns', [ReturnController::class, 'store']);

// Rute untuk halaman tambah mobil
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars', [CarController::class, 'store']);

// Rute untuk halaman tambah pengguna
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

// Rute untuk halaman utama atau dashboard aplikasi
Route::get('/', function () {
    return view('welcome');
});
