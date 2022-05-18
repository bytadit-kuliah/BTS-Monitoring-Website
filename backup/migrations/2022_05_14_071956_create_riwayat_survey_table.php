<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_survey', function (Blueprint $table) {
            $table->integer('Id_Riwayat_Survey', true);
            $table->integer('Id_Surveyor')->index('Id_Surveyor');
            $table->integer('Id_Survey')->index('Id_Survey');
            $table->string('Status', 50)->nullable();
            $table->timestamp('Waktu_Diedit')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_survey');
    }
}
