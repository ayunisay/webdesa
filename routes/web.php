<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\RtRwController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehamilanController;

Route::get('/', function () {
    // Arahkan langsung ke halaman login jika belum login
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::get('/logout', 'logout')->name('logout');
});

//user view
Route::middleware(['auth'])->group(function() {
    Route::middleware(['role:user'])->group(function() {
        Route::get('/user-dashboard', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');

        Route::get('/posyandu', [PosyanduController::class, 'index'])->name('posyandu');

        // //kehamilan
        Route::get('/posyandu-kehamilan', [PosyanduController::class, 'kehamilanview'])->name('posyandu-kehamilan');
        //tambah kehamilan
        Route::post('/tambah-data-kehamilan', [KehamilanController::class, 'tambahDataKehamilan'])->name('tambah-data-kehamilan');

        //data anak
        Route::get('/posyandu-data-anak', [PosyanduController::class, 'dataAanakView'])->name('posyandu-data-anak');
        //data lansia
        Route::get('/posyandu-data-lansia', [PosyanduController::class, 'dataLansiaView'])->name('posyandu-data-lansia');
        //data kelahiran
        Route::get('/posyandu-data-kelahiran', [PosyanduController::class, 'dataKelahiranView'])->name('posyandu-data-kelahiran');

        // //rt-rw
        Route::get('/rt-rw', [RtRwController::class, 'index'])->name('rt-rw');
        // //laporan bencana
        Route::get('/pelaporan-bencana', [RtRwController::class, 'laporanBencana'])->name('pelaporan-bencana');
        //laporan kematian
        Route::get('/pelaporan-kematian', [RtRwController::class, 'laporanKematian'])->name('pelaporan-kematian');
        //laporan kepindahan dan kedatangan
        Route::get('/pelaporan-kepindahan-datang', [RtRwController::class, 'laporanKepindahanKedatangan'])->name('pelaporan-kepindahan-datang');
        //laporan tindak kriminal
        Route::get('/pelaporan-tindak-kriminal', [RtRwController::class, 'laporanTindakKriminal'])->name('pelaporan-tindak-kriminal');
    });


//admin view
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin-dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    });
});

