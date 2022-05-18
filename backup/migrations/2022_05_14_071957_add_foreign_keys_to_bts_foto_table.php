<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBtsFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bts_foto', function (Blueprint $table) {
            $table->foreign(['Id_BTS'], 'bts_foto_ibfk_1')->references(['Id_BTS'])->on('bts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bts_foto', function (Blueprint $table) {
            $table->dropForeign('bts_foto_ibfk_1');
        });
    }
}
