<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEditSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edit_survey', function (Blueprint $table) {
            $table->foreign(['Id_Editor'], 'edit_survey_ibfk_1')->references(['Id_Admin'])->on('admin');
            $table->foreign(['Id_Survey'], 'edit_survey_ibfk_2')->references(['Id_Survey'])->on('survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edit_survey', function (Blueprint $table) {
            $table->dropForeign('edit_survey_ibfk_1');
            $table->dropForeign('edit_survey_ibfk_2');
        });
    }
}
