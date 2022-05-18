<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditBtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit_bts', function (Blueprint $table) {
            $table->timestamp('Waktu_Diedit')->useCurrent();
            $table->integer('Id_Editor')->index('Id_Editor');
            $table->integer('Id_BTS_edit')->index('Id_BTS_edit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edit_bts');
    }
}
