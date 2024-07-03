<?php

use App\Http\Controllers\Admin\DataJemaatController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PendataanBaptisController;
use App\Http\Controllers\Admin\PendataanKematianController;
use App\Http\Controllers\Admin\PendataanMenikahController;
use App\Http\Controllers\Admin\PendataanSidiController;
use App\Http\Controllers\Jemaat\PendaftaranBaptisController;
use App\Http\Controllers\Jemaat\PendaftaranMenikahController;
use App\Http\Controllers\Jemaat\PendaftaranSidiController;
use App\Http\Controllers\Jemaat\ProfilController;
use App\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', Login::class)->name('login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/data-jemaat', [DataJemaatController::class, 'index'])->name('data-jemaat');
        Route::get('/data-jemaat/create', [DataJemaatController::class, 'create'])->name('data-jemaat-create');
        Route::post('/data-jemaat', [DataJemaatController::class, 'store']);
        Route::get('/data-jemaat/{id}', [DataJemaatController::class, 'show'])->name('data-jemaat-show');
        Route::get('/data-jemaat/{id}/edit', [DataJemaatController::class, 'edit'])->name('data-jemaat-edit');
        Route::put('/data-jemaat/{id}', [DataJemaatController::class, 'update']);
        Route::delete('/data-jemaat/{id}', [DataJemaatController::class, 'destroy']);
        Route::post('/data-jemaat/unduh-surat-akte-lahir/{id}', [DataJemaatController::class, 'unduhSuratAkteLahir']);
        
        Route::get('/pendataan-baptis', [PendataanBaptisController::class, 'index'])->name('pendataan-baptis');
        Route::put('/pendataan-baptis/{id}', [PendataanBaptisController::class, 'update'])->name('pendataan-baptis-update');

        Route::get('/pendataan-sidi', [PendataanSidiController::class, 'index'])->name('pendataan-sidi');
        Route::put('/pendataan-sidi/{id}', [PendataanSidiController::class, 'update'])->name('pendataan-sidi-update');
        Route::post('/pendataan-sidi/unduh-surat-baptis/{id}', [PendataanSidiController::class, 'unduhSuratBaptis'])->name('unduh-surat-baptis');
        
        Route::get('/pendataan-menikah', [PendataanMenikahController::class, 'index'])->name('pendataan-menikah');
        Route::get('/pendataan-menikah/{id}', [PendataanMenikahController::class, 'show'])->name('pendataan-menikah-show');
        Route::put('/pendataan-menikah/{id}', [PendataanMenikahController::class, 'update'])->name('pendataan-menikah-update');
        Route::post('/pendataan-menikah/unduh-berkas-pendaftaran-menikah/{id}', [PendataanMenikahController::class, 'unduhBerkasPendaftaranMenikah'])->name('unduh-berkas-pendaftaran-menikah');

        Route::get('/pendataan-kematian', [PendataanKematianController::class, 'index'])->name('pendataan-kematian');
        Route::post('/pendataan-kematian/ubah-status-kematian', [PendataanKematianController::class, 'ubahStatusKematian'])->name('ubah-status-kematian');

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/cetak-pdf', [LaporanController::class, 'cetakPDF'])->name('laporan-cetak-pdf');
    });

    Route::group(['middleware' => 'role:Jemaat'], function () {
        Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
        Route::post('/profil/unduh-surat-akte-lahir/{id}', [ProfilController::class, 'unduhSuratAkteLahir']);
        
        Route::get('/pendaftaran-baptis', [PendaftaranBaptisController::class, 'create'])->name('pendaftaran-baptis');
        Route::post('/pendaftaran-baptis', [PendaftaranBaptisController::class, 'store'])->name('pendaftaran-baptis-store');
        Route::post('/cek-status-baptis', [PendaftaranBaptisController::class, 'cekStatusBaptis'])->name('cek-status-baptis');

        Route::get('/pendaftaran-sidi', [PendaftaranSidiController::class, 'create'])->name('pendaftaran-sidi');
        Route::post('/pendaftaran-sidi', [PendaftaranSidiController::class, 'store'])->name('pendaftaran-sidi-store');
        Route::post('/cek-status-sidi', [PendaftaranSidiController::class, 'cekStatusSidi'])->name('cek-status-sidi');

        Route::get('/pendaftaran-menikah', [PendaftaranMenikahController::class, 'create'])->name('pendaftaran-menikah');
        Route::post('/pendaftaran-menikah', [PendaftaranMenikahController::class, 'store'])->name('pendaftaran-menikah-store');
        Route::post('/cek-status-menikah', [PendaftaranMenikahController::class, 'cekStatusMenikah'])->name('cek-status-menikah');
    });
});
