<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btslists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('btstype_id');
            $table->foreignId('village_id');
            $table->foreignId('owner_id');
            $table->string('nama');
            $table->text('lokasi');
            $table->float('panjangTanah');
            $table->float('lebarTanah');
            $table->float('latitude');
            $table->float('longitude');
            $table->float('tinggiTower');
            $table->boolean('genset');
            $table->boolean('tembokBatas');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('btslists');
    }
};
