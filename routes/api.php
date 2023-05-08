<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    //barang
    Route::get('list-barang/{search}', [BarangController::class, 'get_barang'])->name('barang.get');
    Route::post('store-barang', [BarangController::class, 'store_barang'])->name('barang.store');
    Route::put('update-barang/{id}', [BarangController::class, 'update_barang'])->name('barang.update');

    //satuan
    Route::post('store-satuan/{idBarang}',[SatuanController::class,'store_satuan'])->name('satuan.store');
    Route::put('update-satuan/update/{id}',[SatuanController::class,'update_satuan'])->name('satuan.update');

    //master
    Route::get('master-barang/', [BarangController::class, 'master_barang'])->name('barang.master');


});
