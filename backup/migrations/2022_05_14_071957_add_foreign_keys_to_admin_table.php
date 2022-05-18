<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->foreign(['Id_User'], 'admin_ibfk_1')->references(['Id_User'])->on('user');
            $table->foreign(['Email_Admin'], 'admin_ibfk_3')->references(['Email'])->on('user');
            $table->foreign(['Username'], 'admin_ibfk_2')->references(['Username'])->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropForeign('admin_ibfk_1');
            $table->dropForeign('admin_ibfk_3');
            $table->dropForeign('admin_ibfk_2');
        });
    }
}
