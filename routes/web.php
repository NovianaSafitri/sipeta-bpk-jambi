<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;

// --- HALAMAN DEPAN / USER ---
Route::get('/', [TamuController::class, 'index'])->name('home');
Route::get('/alur', [TamuController::class, 'alur'])->name('alur');
Route::get('/form-tamu', [TamuController::class, 'create'])->name('tamu.create');
Route::post('/simpan-tamu', [TamuController::class, 'store'])->name('tamu.store');

// --- HALAMAN ADMIN ---
// Tambahkan ->name('admin.index') agar filter bulan kamu tidak error lagi
Route::get('/admin', [TamuController::class, 'adminIndex'])->name('admin.index');

// Rute untuk hapus data tamu
Route::delete('/tamu/{id}', [TamuController::class, 'destroy'])->name('tamu.destroy');

// --- FITUR REKAP & CETAK ---
Route::get('/admin/rekap', [TamuController::class, 'rekapIndex'])->name('admin.rekap');
Route::get('/admin/rekap/cetak/{bulan}/{tahun}', [TamuController::class, 'cetakPdf'])->name('admin.cetak');