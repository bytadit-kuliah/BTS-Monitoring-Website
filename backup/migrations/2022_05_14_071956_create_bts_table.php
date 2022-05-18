<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bts', function (Blueprint $table) {
            $table->integer('Id_BTS', true);
            $table->char('Id_Jenis_BTS', 10)->index('Id_Jenis_BTS');
            $table->string('Nama_BTS')->nullable();
            $table->integer('Id_Desa')->index('Id_Desa');
            $table->text('Lokasi_BTS')->nullable();
            $table->integer('Id_Pemilik_BTS')->index('Id_Pemilik_BTS');
            $table->float('Panjang_Tanah', 6)->nullable();
            $table->float('Lebar_Tanah', 6)->nullable();
            $table->float('Latitude', 10, 6)->nullable();
            $table->float('Longitude', 11, 6)->nullable();
            $table->float('Tinggi_Tower', 6)->nullable();
            $table->boolean('Ada_Genset')->nullable();
            $table->boolean('Ada_Tembok_Batas')->nullable();
            $table->timestamp('Waktu_Info_Dibuat')->useCurrent();
            $table->integer('Id_Pembuat_Info')->index('Id_Pembuat_Info');
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
}
