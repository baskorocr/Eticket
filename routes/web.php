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
});
Route::get('/registrasi', [App\Http\Controllers\Karyawan::class, 'search'])->name('search');
Route::get('/konfirmasi/{id}', [App\Http\Controllers\Karyawan::class, 'konfirmasi'])->name('konfirmasi');
Route::post('/konfirmasiPost', [App\Http\Controllers\Karyawan::class, 'konfirmasiPost'])->name('konfirmasiPost');
Route::get('/cekTiket', [App\Http\Controllers\Karyawan::class, 'cekTiket'])->name('cekTiket');
Route::post('/cekTiketPost', [App\Http\Controllers\Karyawan::class, 'cekTiketPost'])->name('cekTiketPost');