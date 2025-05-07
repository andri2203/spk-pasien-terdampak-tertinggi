<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KeputusanPasienController;
use App\Http\Controllers\KriteriaPenyakitController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/pasien/tambah', [PasienController::class, 'tambah']);
    Route::get('/pasien/edit/{id_pasien}', [PasienController::class, 'edit']);
    Route::post('/pasien/tambah', [PasienController::class, 'tambah_pasien']);
    Route::post('/pasien/edit/{id_pasien}', [PasienController::class, 'edit_pasien']);
    Route::post('/pasien/hapus/{id_pasien}', [PasienController::class, 'hapus_pasien']);

    Route::get('/penyakit', [PenyakitController::class, 'index']);
    Route::get('/penyakit/tambah', [PenyakitController::class, 'tambah']);
    Route::get('/penyakit/edit/{id_penyakit}', [PenyakitController::class, 'edit']);
    Route::post('/penyakit/tambah', [PenyakitController::class, 'tambah_penyakit']);
    Route::post('/penyakit/edit/{id_penyakit}', [PenyakitController::class, 'edit_penyakit']);
    Route::post('/penyakit/hapus/{id_penyakit}', [PenyakitController::class, 'hapus_penyakit']);

    Route::get('/kriteria-penyakit', [KriteriaPenyakitController::class, 'index']);
    Route::get('/kriteria-penyakit/tambah', [KriteriaPenyakitController::class, 'tambah']);
    Route::get('/kriteria-penyakit/bobot-kriteria/{id_penyakit}', [KriteriaPenyakitController::class, 'tambah_bobot_kriteria']);
    Route::post('/kriteria-penyakit/tambah', [KriteriaPenyakitController::class, 'tambah_kriteria']);
    Route::post('/kriteria-penyakit/bobot-kriteria/{id_penyakit}', [KriteriaPenyakitController::class, 'proses']);

    Route::get('/keputusan-pasien', [KeputusanPasienController::class, 'index']);
    Route::get('/keputusan-pasien/{id_penyakit}', [KeputusanPasienController::class, 'data_keputusan_pasien']);
    Route::get('/keputusan-pasien/tambah/{id_penyakit}', [KeputusanPasienController::class, 'tambah']);
    Route::get('/keputusan-pasien/edit/{id_pasien}/{id_penyakit}', [KeputusanPasienController::class, 'edit']);
    Route::post('/keputusan-pasien/tambah', [KeputusanPasienController::class, 'tambah_nilai_keputusan']);
    Route::post('/keputusan-pasien/edit', [KeputusanPasienController::class, 'edit_nilai_keputusan']);

    Route::get('/evaluasi-pasien', [EvaluasiController::class, 'index']);
    Route::get('/evaluasi-pasien/{id_penyakit}', [EvaluasiController::class, 'index']);
    Route::get('/hasil-evaluasi-pasien', [EvaluasiController::class, 'hasil']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login_view']);
    Route::post('/login', [AuthController::class, 'login']);
});
