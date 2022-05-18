<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEditBtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edit_bts', function (Blueprint $table) {
            $table->foreign(['Id_Editor'], 'edit_bts_ibfk_1')->references(['Id_Admin'])->on('admin');
            $table->foreign(['Id_BTS_edit'], 'edit_bts_ibfk_2')->references(['Id_BTS'])->on('bts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edit_bts', function (Blueprint $table) {
            $table->dropForeign('edit_bts_ibfk_1');
            $table->dropForeign('edit_bts_ibfk_2');
        });
    }
}
