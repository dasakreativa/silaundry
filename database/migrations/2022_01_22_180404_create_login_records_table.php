<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginRecordsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('login_records', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('username')->nullable();
      $table->string('browser')->nullable();
      $table->string('ip')->nullable();
      $table->string('country')->nullable();
      $table->string('session_id')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('login_records');
  }
}
