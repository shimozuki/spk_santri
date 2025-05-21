<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserContoller;
use App\Models\Kriteria;
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

Route::redirect('/', 'login');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::resource('profile', ProfileController::class);

    Route::resource('alternatif', AlternatifController::class)->middleware('App\Http\Middleware\AlternatifMiddleware');
    Route::middleware('App\Http\Middleware\KriteriaMiddleware')->group(function () {
        Route::resource('kriteria', KriteriaController::class);

        Route::prefix('subkriteria')->group(function () {
            Route::get('/{kriteria}', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
            Route::get('/create/{kriteria}', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
            Route::post('/store/{kriteria}', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
            Route::delete('/delete/{subKriteria}/{kriteria}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');
            Route::get('/show/{subKriteria}/{kriteria}', [SubKriteriaController::class, 'show'])->name('subkriteria.show');
            Route::put('/update/{subKriteria}/{kriteria}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
        });
    });


    Route::middleware('App\Http\Middleware\NilaiMiddleware')->group(function () {
        Route::resource('penilaian', PenilaianController::class);
        Route::resource('metode', MetodeController::class);
    });

    Route::resource('laporan', LaporanController::class)->middleware('App\Http\Middleware\AlternatifMiddleware');
    Route::resource('users', UserContoller::class)->middleware('App\Http\Middleware\UserMiddleware');;
});
