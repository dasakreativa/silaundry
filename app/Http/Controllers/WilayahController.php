<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahController extends Controller
{
  /**
   * Get all provinces
   *
   * @package SiLaundry
   * @since 1.0.0
   * @return json
   */
  public function provinsi(Request $request)
  {
    return response()->json([
      'status'  => "Fetched",
      'code'    => 200,
      'success' => true,
      'error'   => false,
      'message' => 'Semua data provinsi berhasil diambil',
      'data'    => $request->search ? \App\Models\Provinsi::where('name', 'LIKE', "%{$request->search}%")->get() : \App\Models\Provinsi::all(),
    ]);
  }

  /**
   * Get all regencies
   *
   * @package SiLaundry
   * @since 1.0.0
   * @return json
   *
   * @param $province num|string data ID provinsi
   */
  public function kabupaten($province, Request $request)
  {
    $check = \App\Models\Kabupaten::where([
      ['province', '=', $province],
      ['name', 'LIKE', "%{$request->search}%"]
    ]);

    if($check->count() > 0)
    {
      return response()->json([
        'status'  => "Fetched",
        'code'    => 200,
        'success' => true,
        'error'   => false,
        'message' => 'Semua data kabupaten berhasil diambil',
        'data'    => $check->get(),
      ]);
    } else {
      return response()->json([
        'status'  => "Error",
        'code'    => 500,
        'success' => false,
        'error'   => true,
        'message' => 'Semua data kabupaten gagal diambil',
        'data'    => null,
      ], 500);
    }
  }

  /**
   * Get all districts
   *
   * @package SiLaundry
   * @since 1.0.0
   * @return json
   *
   * @param $regency num|string data ID kabupaten
   */
  public function kecamatan($regency, Request $request)
  {
    $check = \App\Models\Kecamatan::where([
      ['regency', '=', $regency],
      ['name', 'LIKE', "%{$request->search}%"]
    ]);

    if($check->count() > 0)
    {
      return response()->json([
        'status'  => "Fetched",
        'code'    => 200,
        'success' => true,
        'error'   => false,
        'message' => 'Semua data kecamatan berhasil diambil',
        'data'    => $check->get(),
      ]);
    } else {
      return response()->json([
        'status'  => "Error",
        'code'    => 500,
        'success' => false,
        'error'   => true,
        'message' => 'Semua data kecamatan gagal diambil',
        'data'    => null,
      ], 500);
    }
  }

  /**
   * Get all villages
   *
   * @package SiLaundry
   * @since 1.0.0
   * @return json
   *
   * @param $village num|string data ID kecamatan
   */
  public function kelurahan($district, Request $request)
  {
    $check = \App\Models\Desa::where([
      ['district', '=', $district],
      ['name', 'LIKE', "%{$request->search}%"]
    ]);

    if($check->count() > 0)
    {
      return response()->json([
        'status'  => "Fetched",
        'code'    => 200,
        'success' => true,
        'error'   => false,
        'message' => 'Semua data kelurahan berhasil diambil',
        'data'    => $check->get(),
      ]);
    } else {
      return response()->json([
        'status'  => "Error",
        'code'    => 500,
        'success' => false,
        'error'   => true,
        'message' => 'Semua data kelurahan gagal diambil',
        'data'    => null,
      ], 500);
    }
  }
}
