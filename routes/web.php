<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DaftarTamuController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AdminMiddleware;


// Rute untuk login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(
    ['middleware' => [AdminMiddleware::class, 'auth']],
    function () {
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat_masuk.index');
Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('surat_masuk.create');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat_masuk.store');
Route::get('/surat-masuk/{id}/edit', [SuratMasukController::class, 'edit'])->name('surat_masuk.edit');
Route::put('/surat-masuk/{id}', [SuratMasukController::class, 'update'])->name('surat_masuk.update');
Route::delete('/surat-masuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat_masuk.destroy');

Route::get('/daftar-tamu', [DaftarTamuController::class, 'index'])->name('daftar_tamu.index');
Route::post('/daftar-tamu', [DaftarTamuController::class, 'store'])->name('daftar_tamu.store');
Route::get('/daftar-tamu/{id}/edit', [DaftarTamuController::class, 'edit'])->name('daftar_tamu.edit');
Route::put('/daftar-tamu/{id}', [DaftarTamuController::class, 'update'])->name('daftar_tamu.update');
Route::delete('/daftar-tamu/{id}', [DaftarTamuController::class, 'destroy'])->name('daftar_tamu.destroy');

Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::get('/pengiriman/create', [PengirimanController::class, 'create'])->name('pengiriman.create');
Route::post('/pengiriman', [PengirimanController::class, 'store'])->name('pengiriman.store');
Route::get('/pengiriman/{id}/edit', [PengirimanController::class, 'edit'])->name('pengiriman.edit');
Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('pengiriman.update');
Route::delete('/pengiriman/{id}', [PengirimanController::class, 'destroy'])->name('pengiriman.destroy');

Route::get('/surat-masuk/pdf', [SuratMasukController::class, 'exportPDF'])->name('surat_masuk.pdf');
Route::get('/daftar-tamu/pdf', [DaftarTamuController::class, 'exportPDF'])->name('daftar_tamu.pdf');
Route::get('/pengiriman/pdf', [PengirimanController::class, 'exportPDF'])->name('pengiriman.pdf');
    });

Route::get('/daftar-tamu/create', [DaftarTamuController::class, 'create'])->name('daftar_tamu.create');                                                                                       
