<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveyor', function (Blueprint $table) {
            $table->integer('Id_User')->index('Id_User');
            $table->string('Username', 50)->index('Username');
            $table->integer('Id_Surveyor', true);
            $table->string('Foto_Surveyor')->nullable();
            $table->string('Nama_Depan')->nullable();
            $table->string('Nama_Belakang')->nullable();
            $table->string('Email_Surveyor')->nullable()->index('Email_Surveyor');
            $table->text('Alamat')->nullable();
            $table->integer('Jumlah_Survey')->nullable();
            $table->integer('Id_Pembuat_Data')->index('Id_Pembuat_Data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveyor');
    }
}
