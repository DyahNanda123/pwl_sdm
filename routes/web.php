<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\userController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [userController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list', [userController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [userController::class, 'create']);   // menampilkan halaman form tambah user
    Route::post('/', [userController::class, 'store']);         // menyimpan data user baru
    Route::get('/{id}', [userController::class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit', [userController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [userController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [userController::class, 'destroy']); // menghapus data user
});