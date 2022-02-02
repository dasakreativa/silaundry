<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('outlets', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('name')->nullable();
      $table->string('owner')->nullable();
      $table->enum('status', ['aktif', 'nonaktif'])->nullable()->default('aktif');
      $table->string('alamat_jalan', 100)->nullable();
      $table->string('alamat_kelurahan', 100)->nullable();
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
    Schema::dropIfExists('outlets');
  }
}
