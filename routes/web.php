<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/stok', [ProdukController::class, 'index']);
Route::get('/pemasukan', [TransaksiController::class, 'pemasukan']);
Route::get('/pengeluaran', [TransaksiController::class, 'pengeluaran']);


Route::get('/rekap', [TransaksiController::class, 'rekap']);

Route::post('/stok', [ProdukController::class, 'store']);
Route::put('/stok/{id}', [ProdukController::class, 'update']);
Route::delete('/stok/{id}', [ProdukController::class, 'destroy']);

Route::get('/{tipe}', [TransaksiController::class, 'index'])->where('tipe', 'masuk|keluar');
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
Route::get('/stok/{id}/edit', [ProdukController::class, 'edit']);
Route::get('/penjualan', [PenjualanController::class, 'create']);
Route::post('/penjualan', [PenjualanController::class, 'store']);
