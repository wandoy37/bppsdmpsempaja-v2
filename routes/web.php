<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoPublikController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::controller(SiteController::class)->group(function () {
    // Welcome
    Route::get('/', 'welcome')->name('welcome');
    // Beranda
    Route::get('/beranda', 'beranda')->name('site.beranda');

    // Profil
    Route::get('/profil', 'profil')->name('site.profil');

    // Berita
    Route::get('/berita', 'berita')->name('site.berita');
    Route::get('/berita/{slug}', 'show')->name('site.berita.show');
    // Kategori Berita
    Route::get('/kategori/{slug}', 'kategori_berita_index')->name('site.kategori.berita.index');

    // Informasi Publik
    Route::get('/info-publik/{slug}', 'informasi_publik_show')->name('site.info.publik');

    // Kontak
    Route::get('/kontak', 'kontak')->name('site.kontak');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Kategori Controller
    Route::resource('/dashboard/kategori', KategoriController::class);
    // Post Controller
    Route::resource('dashboard/postingan', PostinganController::class);

    // Pengguna Controller
    Route::middleware(['role:admin'])->group(function () {
        Route::get('dashboard/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('dashboard/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::post('dashboard/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::delete('dashboard/pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    });
    Route::get('dashboard/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::patch('dashboard/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');

    // QRCODE Controller
    Route::resource('dashboard/qrcode', QrcodeController::class);

    // Informasi Publik Controller
    Route::resource('dashboard/info-publik', InfoPublikController::class);
});
