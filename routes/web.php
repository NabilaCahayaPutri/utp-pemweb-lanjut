<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

    Route::get('/riwayat', [LaporanController::class, 'index'])->name('riwayat');
    Route::get('/buat-laporan', [LaporanController::class, 'create'])->name('buat-laporan');
    Route::post('/buat-laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit'); 
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update'); 
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    Route::get('/profil', [UserController::class, 'index'])->name('profil');
    Route::post('/profil', [UserController::class, 'update'])->name('profil.update');
    Route::post('/ubah-password', [UserController::class, 'updatePassword'])->name('ubah-password');
});
