<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', [DashboardController::class, 'dashboard']);

Route::get('/data-barang', [BarangController::class, 'data_barang']);
Route::post('/tambah-barang', [BarangController::class, 'tambah_barang']);
Route::put('/edit-barang/{id}', [BarangController::class, 'edit_barang']);
Route::delete('/hapus-barang/{id}', [BarangController::class, 'hapus_barang']);
Route::get('/barangs/search', [ProductController::class, 'search']);

Route::get('/data-pelanggan', [PelangganController::class, 'data_pelanggan']);
Route::post('/tambah-pelanggan', [PelangganController::class, 'tambah_pelanggan']);
Route::put('/edit-pelanggan/{id}', [PelangganController::class, 'edit_pelanggan']);
Route::delete('/hapus-pelanggan/{id}', [PelangganController::class, 'hapus_pelanggan']);

Route::get('/faktur', [FakturController::class, 'faktur']);
Route::post('/tambah-faktur', [FakturController::class, 'tambah_faktur']);
Route::put('/edit-faktur/{id}', [FakturController::class, 'edit_faktur']);
Route::delete('/hapus-faktur/{id}', [FakturController::class, 'hapus_faktur']);
Route::get('/invoice/{id}', [FakturController::class, 'invoice']);
Route::post('/tambah-invoice', [FakturController::class, 'tambah_invoice']);
Route::put('/edit-invoice/{id}', [FakturController::class, 'edit_invoice']);
Route::delete('/hapus-invoice/{id}', [FakturController::class, 'hapus_invoice']);
Route::get('/cetak-invoice/{id}', [FakturController::class, 'cetak_invoice']);