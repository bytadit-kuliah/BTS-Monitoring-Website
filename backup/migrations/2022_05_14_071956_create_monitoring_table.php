<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring', function (Blueprint $table) {
            $table->integer('Id_Monitoring', true);
            $table->year('Tahun_Monitoring')->nullable();
            $table->dateTime('Waktu_Kunjungan');
            $table->integer('Id_BTS')->index('Id_BTS');
            $table->integer('Id_Surveyor')->index('Id_Surveyor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring');
    }
}
