<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitoring', function (Blueprint $table) {
            $table->foreign(['Id_BTS'], 'monitoring_ibfk_1')->references(['Id_BTS'])->on('bts');
            $table->foreign(['Id_Surveyor'], 'monitoring_ibfk_2')->references(['Id_Surveyor'])->on('surveyor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitoring', function (Blueprint $table) {
            $table->dropForeign('monitoring_ibfk_1');
            $table->dropForeign('monitoring_ibfk_2');
        });
    }
}
