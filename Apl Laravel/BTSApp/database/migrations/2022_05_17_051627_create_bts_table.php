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
        Schema::create('bts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenisBTS_id');
            $table->foreignId('desa_id');
            $table->foreignId('owner_id');
            $table->string('namaBTS');
            $table->text('lokasi');
            $table->float('panjang_tanah');
            $table->float('lebar_tanah');
            $table->float('latitude');
            $table->float('longitude');
            $table->float('tinggi_tower');
            $table->boolean('genset');
            $table->boolean('tembok_batas');
            $table->timestamp('publishedAt');
            $table->foreignId('publishedBy');
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
        Schema::dropIfExists('bts');
    }
};
