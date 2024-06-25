<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

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
    return view('index');
})->name('index');
Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');


Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::post('/laporan', [LaporanController::class, 'index']);
Route::get('/remove/{nona}', [LaporanController::class, 'removeData']);
Route::get('invoice/{detail}', [LaporanController::class, 'invoice']);


Route::get('profile', [UserController::class, 'updateProfile']);
Route::post('profile', [UserController::class, 'updateProfile']);


Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/tambah_produk', [ProdukController::class, 'tambah_produk']);
Route::get('/tambah_produk', [ProdukController::class, 'tambah_produk']);
Route::get('{hapus_produk}/hapus', [ProdukController::class, 'hapus_produk']);
Route::post('{edit_produk}/edit', [ProdukController::class, 'edit_produk']);


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::post('/input-keranjang', [TransaksiController::class, 'input_keranjang']);
Route::get('/hapus-keranjang/{hapus}', [TransaksiController::class, 'hapus']);
Route::post('/hapus-semua', [TransaksiController::class, 'hapusSemua']);
Route::post('/simpan-transaksi', [TransaksiController::class, 'simpanTransaksi'])->name('simpanTransaksi');
Route::get('invoice', [TransaksiController::class, 'simpanTransaksi'])->name('invoice');
Route::post('invoice', [TransaksiController::class, 'simpanTransaksi'])->name('invoice');


Route::get('/user', [UserController::class, 'index']);
Route::get('{hapus}/hapus-user', [UserController::class, 'delete']);
Route::post('/tambah-user', [UserController::class, 'tambah_user']);
Route::post('{edit_user}/edit-user', [UserController::class, 'edit_user']);
