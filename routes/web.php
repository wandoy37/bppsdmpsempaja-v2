<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PostinganController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Kategori Controller
    Route::resource('/dashboard/kategori', KategoriController::class);
    // Post Controller
    Route::resource('dashboard/postingan', PostinganController::class);
    // Pengguna Controller
    Route::resource('dashboard/pengguna', PenggunaController::class);

    Route::middleware(['role:admin'])->group(function () {
        Route::get('dashboard/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('dashboard/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::delete('dashboard/pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    });
    Route::get('dashboard/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::patch('dashboard/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
});
