<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_log', function (Blueprint $table) {
            $table->foreign(['Id_User'], 'user_log_ibfk_1')->references(['Id_User'])->on('user');
            $table->foreign(['Username'], 'user_log_ibfk_2')->references(['Username'])->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_log', function (Blueprint $table) {
            $table->dropForeign('user_log_ibfk_1');
            $table->dropForeign('user_log_ibfk_2');
        });
    }
}
