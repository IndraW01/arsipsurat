<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Surat\SuratKeluarController;
use App\Http\Controllers\Surat\SuratMasukController;
use App\Http\Controllers\Unit\UnitController;

Auth::routes(['reset' => false, 'confirm' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('surat-masuk/{surat_masuk:judul_suratmasuk}', [SuratMasukController::class, 'download'])->name('surat.masuk.download')->middleware('auth');
Route::resource('surat-masuk', SuratMasukController::class)->names('surat.masuk')->scoped(['surat_masuk' => 'judul_suratmasuk'])->middleware('auth');

Route::post('surat-keluar/{surat_keluar:judul_suratkeluar}', [SuratKeluarController::class, 'download'])->name('surat.keluar.download')->middleware('auth');
Route::resource('surat-keluar', SuratKeluarController::class)->names('surat.keluar')->scoped(['surat_keluar' => 'judul_suratkeluar'])->middleware('auth');

Route::resource('unit', UnitController::class)->names('unit')->except('show')->scoped(['unit' => 'kode_unit'])->middleware('auth');

