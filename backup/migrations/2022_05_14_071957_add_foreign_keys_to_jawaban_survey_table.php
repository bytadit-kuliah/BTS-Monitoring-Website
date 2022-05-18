<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToJawabanSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawaban_survey', function (Blueprint $table) {
            $table->foreign(['Id_Survey'], 'jawaban_survey_ibfk_1')->references(['Id_Survey'])->on('survey');
            $table->foreign(['Id_Monitoring'], 'jawaban_survey_ibfk_3')->references(['Id_Monitoring'])->on('monitoring');
            $table->foreign(['Id_Surveyor'], 'jawaban_survey_ibfk_2')->references(['Id_Surveyor'])->on('surveyor');
            $table->foreign(['Jawaban_Survey'], 'jawaban_survey_ibfk_4')->references(['Id_Pil_Jwb'])->on('pilihan_jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban_survey', function (Blueprint $table) {
            $table->dropForeign('jawaban_survey_ibfk_1');
            $table->dropForeign('jawaban_survey_ibfk_3');
            $table->dropForeign('jawaban_survey_ibfk_2');
            $table->dropForeign('jawaban_survey_ibfk_4');
        });
    }
}
