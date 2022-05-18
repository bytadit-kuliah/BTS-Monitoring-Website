<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bts', function (Blueprint $table) {
            $table->foreign(['Id_Pemilik_BTS'], 'bts_ibfk_1')->references(['Id_Pemilik'])->on('pemilik');
            $table->foreign(['Id_Desa'], 'bts_ibfk_3')->references(['Id_Desa'])->on('desa');
            $table->foreign(['Id_Pembuat_Info'], 'bts_ibfk_2')->references(['Id_Admin'])->on('admin');
            $table->foreign(['Id_Jenis_BTS'], 'bts_ibfk_4')->references(['Id_Jenis_BTS'])->on('jenis_bts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bts', function (Blueprint $table) {
            $table->dropForeign('bts_ibfk_1');
            $table->dropForeign('bts_ibfk_3');
            $table->dropForeign('bts_ibfk_2');
            $table->dropForeign('bts_ibfk_4');
        });
    }
}
