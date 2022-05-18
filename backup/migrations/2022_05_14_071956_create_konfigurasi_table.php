<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi', function (Blueprint $table) {
            $table->integer('Id_Konfigurasi', true);
            $table->string('Nama_Konfigurasi')->nullable();
            $table->string('Value')->nullable();
            $table->dateTime('Waktu_Buat_Config')->useCurrent();
            $table->timestamp('Waktu_Edit_Config')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfigurasi');
    }
}
