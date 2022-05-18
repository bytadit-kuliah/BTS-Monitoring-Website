<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_survey', function (Blueprint $table) {
            $table->integer('Id_Jawaban', true);
            $table->integer('Id_Surveyor')->index('Id_Surveyor');
            $table->integer('Id_Survey')->index('Id_Survey');
            $table->integer('Id_Monitoring')->index('Id_Monitoring');
            $table->integer('Jawaban_Survey')->nullable()->index('Jawaban_Survey');
            $table->timestamp('Waktu_Buat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_survey');
    }
}
