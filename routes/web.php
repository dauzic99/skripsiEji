<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RocController;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/tumbuhan/{slug}', [LandingController::class, 'listTumbuhan'])->name('landing.tumbuhan');
Route::get('/tumbuhan/detail/{slug}', [LandingController::class, 'detailTumbuhan'])->name('landing.tumbuhan.detail');
Route::get('/penyakit', [LandingController::class, 'listPenyakit'])->name('landing.penyakit');
Route::get('/penyakit/{slug}', [LandingController::class, 'detailPenyakit'])->name('landing.penyakit.detail');
Route::get('/perhitungan', [LandingController::class, 'perhitungan'])->name('landing.perhitungan');



Route::get('/user', function () {
    return view('dashboard');
});

Route::post('/admin/roc', [RocController::class, 'update'])->name('roc.update');
Route::get('/admin/roc/getBobot', [RocController::class, 'getBobot'])->name('roc.bobot');
// Route::post('/admin/roc/save', [AhpController::class, 'store']);

Route::post('/admin/getPenyakit', [MooraController::class, 'getPenyakit'])->name('getPenyakit');
Route::post('/admin/getPenyakitFiltered', [MooraController::class, 'getPenyakitFiltered'])->name('getPenyakitFiltered');
Route::post('/admin/getMatriks', [MooraController::class, 'getMatriks'])->name('getMatriks');
Route::post('/admin/getMatriksFiltered', [MooraController::class, 'getMatriksFiltered'])->name('getMatriksFiltered');

Route::post('/admin/moora/proses', [MooraController::class, 'proses'])->name('moora.proses');
Route::post('/admin/moora/preferensi', [MooraController::class, 'hitungPreferensi'])->name('preferensi');
Route::post('/admin/moora/preferensiFiltered', [MooraController::class, 'hitungPreferensiFiltered'])->name('preferensiFiltered');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    // route test


    Route::get('/admin/moora', [MooraController::class, 'index']);
    Route::get('/admin/roc', [RocController::class, 'index'])->name('roc.index');




    Route::get('/admin/pegawai', [pegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/admin/pegawai/create', [pegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/admin/pegawai/save', [pegawaiController::class, 'store'])->name('pegawai.save');
    Route::post('/admin/pegawai/update/{slug}', [pegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/admin/pegawai/{id}', [pegawaiController::class, 'destroy'])->name('pegawai.delete');
    Route::get('/admin/pegawai/edit/{slug}', [pegawaiController::class, 'edit'])->name('pegawai.edit');

    Route::get('/admin/kriteria', [CriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/admin/kriteria/create', [CriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/admin/kriteria/save', [CriteriaController::class, 'store'])->name('kriteria.save');
    Route::post('/admin/kriteria/update/{id}', [CriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/admin/kriteria/{id}', [CriteriaController::class, 'destroy'])->name('kriteria.delete');
    Route::get('/admin/kriteria/edit/{id}', [CriteriaController::class, 'edit'])->name('kriteria.edit');





    Route::get('/admin/user', [UserController::class, 'index']);
    Route::get('/admin/user/create', [UserController::class, 'create']);
    Route::post('/admin/user/save', [UserController::class, 'store']);
    Route::post('/admin/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy']);
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
});

require __DIR__ . '/auth.php';
