<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagePekerjaanController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Route untuk autentikasi
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Route yang hanya bisa diakses jika admin sudah login
    Route::middleware('admin.auth')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); // Tidak butuh controller terpisah
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Route untuk pengelolaan pekerjaan
        Route::get('pekerjaan', [ManagePekerjaanController::class, 'index'])->name('pekerjaan.index');
        Route::get('pekerjaan/create', [ManagePekerjaanController::class, 'create'])->name('pekerjaan.create');
        Route::post('pekerjaan', [ManagePekerjaanController::class, 'store'])->name('pekerjaan.store');
        Route::get('pekerjaan/{pekerjaan}/edit', [ManagePekerjaanController::class, 'edit'])->name('pekerjaan.edit');
        Route::put('pekerjaan/{pekerjaan}', [ManagePekerjaanController::class, 'update'])->name('pekerjaan.update');
        Route::delete('pekerjaan/{pekerjaan}', [ManagePekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');
    });

});



use App\Http\Controllers\Pelamar\PelamarAuthController;

Route::prefix('pelamar')->group(function () {
    Route::middleware('guest:pelamar')->group(function () {
    Route::get('register', [PelamarAuthController::class, 'showRegisterForm'])->name('pelamar.register');
    Route::post('register', [PelamarAuthController::class, 'register']);
    Route::get('login', [PelamarAuthController::class, 'showLoginForm'])->name('pelamar.login');
    Route::post('login', [PelamarAuthController::class, 'login'])->name('pelamar.login.post');
   });

    // Halaman Dashboard dan Logout dilindungi oleh middleware pelamar.auth
    Route::middleware('auth:pelamar')->group(function () {
        Route::get('dashboard', [PelamarAuthController::class, 'dashboard'])->name('pelamar.dashboard');
        Route::post('logout', [PelamarAuthController::class, 'logout'])->name('pelamar.logout');
    });
});
