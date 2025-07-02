<?php

use App\Http\Controllers\DonasiBarangController;
use App\Http\Controllers\DonasiTransferController;
use App\Http\Controllers\DonasiTunaiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/home', [LandingPageController::class, 'home'])->name('home'); 
Route::get('/landing', [LandingPageController::class, 'landingPage'])->name('landing'); 

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');

Route::get('/kategori-donasi', [KategoriController::class, 'index'])->name('kategori.donasi');
Route::post('/kategori-donasi/pilih', [KategoriController::class, 'pilih'])->name('kategori.pilih');

Route::get('/form-donasi-transfer', function () {
    return view('donasi_transfer');
})->name('donasi.transfer.form');

Route::get('/donasi/transfer', [DonasiTransferController::class, 'formTransfer'])->name('donasi.transfer.form');

Route::post('/donasi/transfer', [DonasiTransferController::class, 'submitTransfer'])->name('donasi.transfer.submit');

Route::get('/form-donasi-tunai', function () {
    return view('donasi_tunai');
})->name('donasi.tunai.form');

Route::get('/donasi/tunai', [DonasiTunaiController::class, 'formTunai'])->name('donasi.tunai.form');

Route::post('/donasi/tunai', [DonasiTunaiController::class, 'submitTunai'])->name('donasi.tunai.submit');

Route::get('/form-donasi-barang', function () {
    return view('donasi_barang');
})->name('donasi.barang.form');

Route::get('/donasi/barang', [DonasiBarangController::class, 'formBarang'])->name('donasi.barang.form');

Route::post('/donasi/barang', [DonasiBarangController::class, 'submitBarang'])->name('donasi.barang.submit');

// halaman notifikasi setelah donasi berhasil
Route::get('/donasi/success', function () {
    return view('success');
})->name('donasi.success');