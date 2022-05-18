<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPilihanJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pilihan_jawaban', function (Blueprint $table) {
            $table->foreign(['Id_Pertanyaan'], 'pilihan_jawaban_ibfk_1')->references(['Id_Pertanyaan'])->on('pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pilihan_jawaban', function (Blueprint $table) {
            $table->dropForeign('pilihan_jawaban_ibfk_1');
        });
    }
}
