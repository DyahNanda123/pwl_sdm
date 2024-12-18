<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\KategoriKegiatanController;

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


Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);      // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);         // menyimpan data level baru
    Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});

Route::group(['prefix' => 'kategori_kegiatan'], function () {
    Route::get('/', [KategoriKegiatanController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [KategoriKegiatanController::class, 'list']);      // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [KategoriKegiatanController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [KategoriKegiatanController::class, 'store']);         // menyimpan data level baru
    Route::get('/{id}', [KategoriKegiatanController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/edit', [KategoriKegiatanController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [KategoriKegiatanController::class, 'update']);     // menyimpan perubahan data level
    Route::delete('/{id}', [KategoriKegiatanController::class, 'destroy']); // menghapus data level
});

Route::group(['prefix' => 'daftar_kegiatan'], function () {
    Route::get('/', [DaftarKegiatanController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [DaftarKegiatanController::class, 'list']);      // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [DaftarKegiatanController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [DaftarKegiatanController::class, 'store']);         // menyimpan data level baru
    Route::get('/{id}', [DaftarKegiatanController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/edit', [DaftarKegiatanController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [DaftarKegiatanController::class, 'update']);     // menyimpan perubahan data level
    Route::delete('/{id}', [DaftarKegiatanController::class, 'destroy']); // menghapus data level
});
});