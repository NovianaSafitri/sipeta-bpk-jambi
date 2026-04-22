<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;

Route::get('/', [TamuController::class, 'index']);
Route::get('/alur', [TamuController::class, 'alur']);
Route::get('/form-tamu', [TamuController::class, 'create']);
Route::get('/', [TamuController::class, 'index']); // Untuk tampilkan form
Route::post('/simpan-tamu', [TamuController::class, 'store']); // Untuk simpan data
Route::get('/admin', [TamuController::class, 'adminIndex']);
Route::delete('/admin/hapus/{id}', [TamuController::class, 'destroy']);
Route::delete('/tamu/{id}', [TamuController::class, 'destroy'])->name('tamu.destroy');
