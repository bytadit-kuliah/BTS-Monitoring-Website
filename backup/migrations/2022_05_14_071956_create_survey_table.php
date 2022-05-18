<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->integer('Id_Survey', true);
            $table->string('Topik_Survey')->nullable();
            $table->text('Deskripsi_Survey')->nullable();
            $table->timestamp('Waktu_Dibuat')->useCurrent();
            $table->integer('Id_Pembuat')->index('Id_Pembuat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
