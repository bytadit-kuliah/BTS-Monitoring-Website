<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRiwayatSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat_survey', function (Blueprint $table) {
            $table->foreign(['Id_Surveyor'], 'riwayat_survey_ibfk_1')->references(['Id_Surveyor'])->on('surveyor');
            $table->foreign(['Id_Survey'], 'riwayat_survey_ibfk_2')->references(['Id_Survey'])->on('survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_survey', function (Blueprint $table) {
            $table->dropForeign('riwayat_survey_ibfk_1');
            $table->dropForeign('riwayat_survey_ibfk_2');
        });
    }
}
