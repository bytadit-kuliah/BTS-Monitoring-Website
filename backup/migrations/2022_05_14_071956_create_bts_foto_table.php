<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBtsFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bts_foto', function (Blueprint $table) {
            $table->integer('Id_Foto_BTS', true);
            $table->string('Path_Foto')->nullable();
            $table->integer('Id_BTS')->index('Id_BTS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bts_foto');
    }
}
