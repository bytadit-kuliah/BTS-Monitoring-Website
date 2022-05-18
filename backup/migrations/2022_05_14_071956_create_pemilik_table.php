<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->integer('Id_Pemilik', true);
            $table->string('Foto_Pemilik')->nullable();
            $table->string('Nama_Pemilik')->nullable();
            $table->text('Alamat_Pemilik')->nullable();
            $table->string('NoTelp_Pemilik', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilik');
    }
}
