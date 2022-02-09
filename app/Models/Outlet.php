<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
  use HasFactory;

  protected $guarded = [];

  /** ========================= Get user name ========================= */
  /**
   * Get user name
   *
   * @return string
   */
  public function getUser()
  {
    return $this->hasOne(User::class, 'username', 'owner');
  }
  /** ========================= Get user name ========================= */

  /** ========================= Region on database ========================= */
  /**
   * Get village name
   *
   * @return string
   */
  public function getVillage()
  {
    return $this->hasOne(Desa::class, 'id', 'alamat_kelurahan');
  }

  /**
   * Get district name
   *
   * @return string
   */
  public function getDistrict()
  {
    return $this->hasOne(Kecamatan::class, 'id', 'alamat_kecamatan');
  }

  /**
   * Get regency name
   *
   * @return string
   */
  public function getRegency()
  {
    return $this->hasOne(Kabupaten::class, 'id', 'alamat_kabupaten');
  }

  /**
   * Get region name
   *
   * @return string
   */
  public function getProvinces()
  {
    return $this->hasOne(Provinsi::class, 'id', 'alamat_provinsi');
  }
  /** ========================= Region on database ========================= */
}
