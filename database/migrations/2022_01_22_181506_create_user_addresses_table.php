<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_addresses', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('id_user', 100)->nullable();
      $table->string('alamat_jalan', 100)->nullable();
      $table->string('alamat_desa', 100)->nullable();
      $table->string('alamat_kecamatan', 100)->nullable();
      $table->string('alamat_kabupaten', 100)->nullable();
      $table->string('alamat_provinsi', 100)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user_addresses');
  }
}
