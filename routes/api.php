<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use DeviceDetector\Parser\Client\Browser;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::any('/outlet/user-list', [\App\Http\Controllers\panel\OutletController::class, '__userdata'])->name('outlet.user-lists');
Route::any('/outlet/data', [\App\Http\Controllers\panel\OutletController::class, '__data'])->name('outlet.data');

Route::prefix('wilayah')->group(function() {
  Route::any('provinsi', [\App\Http\Controllers\WilayahController::class, 'provinsi'])->name('api.provinsi');
  Route::any('kabupaten/{provinsi}', [\App\Http\Controllers\WilayahController::class, 'kabupaten'])->name('api.kabupaten');
  Route::any('kecamatan/{kabupaten}', [\App\Http\Controllers\WilayahController::class, 'kecamatan'])->name('api.kecamatan');
  Route::any('kelurahan/{kecamatan}', [\App\Http\Controllers\WilayahController::class, 'kelurahan'])->name('api.kelurahan');
});
