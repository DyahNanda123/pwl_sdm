<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailKegiatanController;
use App\Http\Controllers\DetailProgresController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProgresController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'store']);

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'kegiatan'], function () {
    Route::get('/', [KegiatanController::class, 'index']);          // menampilkan halaman awal Kegiatan
    Route::post('/list', [KegiatanController::class, 'list']);      // menampilkan data Kegiatan dalam bentuk json untuk datatables
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);          // menampilkan halaman awal Kegiatan
    Route::post('/list', [KategoriController::class, 'list']);      // menampilkan data Kegiatan dalam bentuk json untuk datatables
});

Route::group(['prefix' => 'progres'], function () {
    Route::get('/', [ProgresController::class, 'index']);          // menampilkan halaman awal Kegiatan
    Route::post('/list', [ProgresController::class, 'list']);      // menampilkan data Kegiatan dalam bentuk json untuk datatables
});

Route::group(['prefix' => 'detailprogres'], function () {
    Route::get('/', [DetailProgresController::class, 'index']);          // menampilkan halaman awal Kegiatan
    Route::post('/list', [DetailProgresController::class, 'list']);      // menampilkan data Kegiatan dalam bentuk json untuk datatables
});

Route::group(['prefix' => 'detailkegiatan'], function () {
    Route::get('/', [DetailKegiatanController::class, 'index']);          // menampilkan halaman awal Kegiatan
    Route::post('/list', [DetailKegiatanController::class, 'list']);      // menampilkan data Kegiatan dalam bentuk json untuk datatables
});