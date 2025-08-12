<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\JenisBarangController;

// Redirect / ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Semua halaman yang butuh login dibungkus middleware auth
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/inventory', function () {
        return Inertia::render('Inventory');
    })->name('inventory');
});

// Barang
Route::get('/barang', function () {
    return Inertia::render('Barang');
})->name('barang');

// Jenis Barang
Route::resource('jenis-barang', JenisBarangController::class);
Route::get('/jenis-barang', function () {
    return Inertia::render('JenisBarang/Index');
})->name('jenis-barang');
Route::get('/jenis-barang', [JenisBarangController::class, 'index'])->name('jenis-barang.index');
Route::post('/jenis-barang', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
Route::delete('/jenis-barang/{id}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');


