<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSurveyorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveyor', function (Blueprint $table) {
            $table->foreign(['Id_User'], 'surveyor_ibfk_1')->references(['Id_User'])->on('user');
            $table->foreign(['Email_Surveyor'], 'surveyor_ibfk_3')->references(['Email'])->on('user');
            $table->foreign(['Username'], 'surveyor_ibfk_2')->references(['Username'])->on('user');
            $table->foreign(['Id_Pembuat_Data'], 'surveyor_ibfk_4')->references(['Id_Admin'])->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surveyor', function (Blueprint $table) {
            $table->dropForeign('surveyor_ibfk_1');
            $table->dropForeign('surveyor_ibfk_3');
            $table->dropForeign('surveyor_ibfk_2');
            $table->dropForeign('surveyor_ibfk_4');
        });
    }
}
