<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question_offeredanswer_surveyor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id');
            $table->foreignId('question_id');
            $table->foreignId('offeredanswer_id');
            $table->foreignId('surveyor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_question_offeredanswer_surveyor');
    }
};
