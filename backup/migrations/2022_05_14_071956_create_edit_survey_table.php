<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit_survey', function (Blueprint $table) {
            $table->timestamp('Waktu_Diedit')->useCurrent();
            $table->integer('Id_Editor')->index('Id_Editor');
            $table->integer('Id_Survey')->index('Id_Survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edit_survey');
    }
}
