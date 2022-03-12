<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanpenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\BukuController@bukunya', function () {
    return view('pesan.index');
});

Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('buku', function () {
//         return view('buku.index');
//     });

//     Route::get('stok', function () {
//         return view('stok.index');
//     });
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('buku', function () {
        return view('buku.index');
    })->middleware(['role:admin|customer']);

    Route::get('kategori', function () {
        return view('kategori.index');
    })->middleware(['role:admin|customer']);

    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('laporanpenjualan', laporanPenjualanController::class);
});
