<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEditJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edit_jawaban', function (Blueprint $table) {
            $table->foreign(['Id_Editor'], 'edit_jawaban_ibfk_1')->references(['Id_Surveyor'])->on('surveyor');
            $table->foreign(['Id_Jawaban_Diedit'], 'edit_jawaban_ibfk_2')->references(['Id_Jawaban'])->on('jawaban_survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edit_jawaban', function (Blueprint $table) {
            $table->dropForeign('edit_jawaban_ibfk_1');
            $table->dropForeign('edit_jawaban_ibfk_2');
        });
    }
}
