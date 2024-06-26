<?php

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
    //return  view('mt');
})->name('index');
Auth::routes(['register' => false]);
Route::get('/registrasi', [App\Http\Controllers\Karyawan::class, 'search'])->name('search');
Route::get('/konfirmasi/{id}', [App\Http\Controllers\Karyawan::class, 'konfirmasi'])->name('konfirmasi');
Route::post('/konfirmasiPost', [App\Http\Controllers\Karyawan::class, 'konfirmasiPost'])->name('konfirmasiPost');
Route::get('/cekTiket', [App\Http\Controllers\Karyawan::class, 'cekTiket'])->name('cekTiket');
Route::post('/cekTiketPost', [App\Http\Controllers\Karyawan::class, 'cekTiketPost'])->name('cekTiketPost');
 Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/overData', [App\Http\Controllers\HomeController::class, 'overData'])->name('overData');
    Route::post('/postScanPresensi', [App\Http\Controllers\Scan::class, 'postScanPresensi'])->name('postScanPresensi');
    Route::post('/manualPresensi', [App\Http\Controllers\Scan::class, 'manualPresensi'])->name('manualPresensi');
    Route::get('/verif/{id}', [App\Http\Controllers\Scan::class, 'verif'])->name('verif');
    Route::get('/scan', [App\Http\Controllers\Scan::class, 'scan'])->name('Scan');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/allData', [App\Http\Controllers\HomeController::class, 'allData'])->name('allData');
     Route::get('/downloadData', [App\Http\Controllers\HomeController::class, 'downloadOverData'])->name('downloadData');
     Route::get('/downloadArea', [App\Http\Controllers\HomeController::class, 'downloadArea'])->name('downloadOverData');
     
    


});