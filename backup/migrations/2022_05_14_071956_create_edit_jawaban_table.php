<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit_jawaban', function (Blueprint $table) {
            $table->timestamp('Waktu_Diedit')->useCurrent();
            $table->integer('Id_Editor')->index('Id_Editor');
            $table->integer('Id_Jawaban_Diedit')->index('Id_Jawaban_Diedit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edit_jawaban');
    }
}
