<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;



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
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::get('/setting', [UserController::class, 'index'])->name('setting');
    Route::post('/setting/update', [UserController::class, 'updateProfile'])->name('setting.update');
    Route::post('/setting/password', [UserController::class, 'updatePassword'])->name('setting.password');

    Route::get('/riwayat', [LaporanController::class, 'index'])->name('riwayat');
    Route::get('/buat-laporan', [LaporanController::class, 'create'])->name('buat-laporan');
    Route::post('/buat-laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit'); 
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update'); 
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
    Route::post('/profil/update', [ProfileController::class, 'update'])->name('profil.update');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profil.password');
    Route::delete('/profil/photo', [ProfileController::class, 'deletePhoto'])->name('profil.deletePhoto');
});
