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
        Schema::create('riwayat_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surveyor_id');
            $table->foreignId('survey_id');
            $table->string('status');
            $table->timestamp('waktu_diedit')->useCurrent();
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
        Schema::dropIfExists('riwayat_surveys');
    }
};
