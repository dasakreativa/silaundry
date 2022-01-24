<?php
/**
 * Route Configurator
 * Disini merpuakan berkas pengatur rute website.
 *
 * @package Silaundry
 * @since 1.0.0
 * @author Dasa Kreativa Studio
 */

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::get('/logout', function() {
  auth()->logout();

  return redirect()->route('login');
})->name('logout');

/** For Login */
Route::prefix('login')->group(function () {
  Route::get('/',       [\App\Http\Controllers\panel\LoginController::class, 'index'])->name('login');
  Route::post('/',      [\App\Http\Controllers\panel\LoginController::class, 'process'])->name('login.process');
});

/** For Login */
Route::prefix('register')->group(function () {
  Route::get('/',       [\App\Http\Controllers\panel\RegisterController::class, 'index'])->name('register');
  Route::post('/',      [\App\Http\Controllers\panel\RegisterController::class, 'process'])->name('register.process');
});

/** Admin Panel */
Route::prefix('panel')->group(function () {
  Route::get('/',       [\App\Http\Controllers\panel\HomeController::class, 'index'])->name('main');
  Route::get('/about',  [\App\Http\Controllers\panel\HomeController::class, 'about'])->name('about');

  /** For Settings */
  Route::prefix('pengaturan')->group(function () {
    Route::get('/',     [\App\Http\Controllers\panel\SettingsController::class, 'home'])->name('setting.home');
  });

  /** For Outlet List */
  Route::resource('outlet',         \App\Http\Controllers\panel\OutletController::class);
  Route::resource('pemesanan',      \App\Http\Controllers\panel\PemesananController::class);
  Route::resource('antrian',        \App\Http\Controllers\panel\AntrianController::class);
  Route::resource('paket-layanan',  \App\Http\Controllers\panel\PaketController::class);
  Route::resource('pelanggan',      \App\Http\Controllers\panel\UserController::class);
});
