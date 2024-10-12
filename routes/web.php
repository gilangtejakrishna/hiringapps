<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagePekerjaanController;
use App\Http\Controllers\Admin\ManageLamaranMasuk;

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

        Route::get('lamaran', [ManageLamaranMasuk::class, 'index'])->name('lamaran.index');
        Route::get('lamaran/{id}', [ManageLamaranMasuk::class, 'show'])->name('lamaran.show'); // Perhatikan di sini
        Route::post('lamaran/{id}', [ManageLamaranMasuk::class, 'update'])->name('lamaran.update');
    });

});



// use App\Http\Controllers\Pelamar\PelamarAuthController;
// use App\Http\Middleware\PelamarAuthenticate; 
// use App\Http\Controllers\Pelamar\PekerjaanController;

// Route::prefix('pelamar')->group(function () {
//     Route::middleware('guest:pelamar')->group(function () {
//         Route::get('register', [PelamarAuthController::class, 'showRegisterForm'])->name('pelamar.register');
//         Route::post('register', [PelamarAuthController::class, 'register']);
//         Route::get('login', [PelamarAuthController::class, 'showLoginForm'])->name('pelamar.login');
//         Route::post('login', [PelamarAuthController::class, 'login'])->name('pelamar.login.submit');
//     });

//     // Halaman Dashboard dan Logout dilindungi oleh middleware PelamarAuthenticate
//     Route::middleware(PelamarAuthenticate::class)->group(function () {
//         Route::get('dashboard', [PelamarAuthController::class, 'dashboard'])->name('pelamar.dashboard');
//         Route::post('logout', [PelamarAuthController::class, 'logout'])->name('pelamar.logout');
//     });
// });




use App\Http\Controllers\Pelamar\PelamarAuthController;
use App\Http\Middleware\PelamarAuthenticate; 
use App\Http\Controllers\Pelamar\PekerjaanController;
use App\Http\Controllers\Pelamar\LamaranPekerjaanController; // Pastikan untuk menambahkan controller ini

Route::prefix('pelamar')->group(function () {
    Route::middleware('guest:pelamar')->group(function () {
        Route::get('register', [PelamarAuthController::class, 'showRegisterForm'])->name('pelamar.register');
        Route::post('register', [PelamarAuthController::class, 'register']);
        Route::get('login', [PelamarAuthController::class, 'showLoginForm'])->name('pelamar.login');
        Route::post('login', [PelamarAuthController::class, 'login'])->name('pelamar.login.submit');
    });

    // Halaman Dashboard dan Logout dilindungi oleh middleware PelamarAuthenticate
    Route::middleware(PelamarAuthenticate::class)->group(function () {
        Route::get('dashboard', [PekerjaanController::class, 'index'])->name('pelamar.dashboard');
        Route::post('logout', [PelamarAuthController::class, 'logout'])->name('pelamar.logout');

        // Rute untuk mengajukan lamaran
        Route::get('lamaran/create/{id_pekerjaan}', [LamaranPekerjaanController::class, 'create'])->name('pelamar.lamaran.create');
        Route::post('lamaran', [LamaranPekerjaanController::class, 'store'])->name('pelamar.lamaran.store');

        // Rute untuk melihat status lamaran
        Route::get('lamaran/status', [LamaranPekerjaanController::class, 'status'])->name('pelamar.lamaran.status');
    });
});




use Illuminate\Support\Facades\Storage;

Route::get('/download/{filename}', function ($filename) {
    $path = storage_path('app/berkas/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->download($path);
})->name('download.file');