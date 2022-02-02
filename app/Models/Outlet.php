<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * Get user name
   *
   * @return string
   */
  public function getUser()
  {
    return $this->hasOne(User::class, 'username', 'owner');
  }
}
