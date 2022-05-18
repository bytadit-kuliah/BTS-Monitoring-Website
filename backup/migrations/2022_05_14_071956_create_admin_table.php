<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('Id_User')->index('Id_User');
            $table->string('Username', 50)->index('Username');
            $table->integer('Id_Admin', true);
            $table->string('Foto_Admin')->nullable();
            $table->string('Nama_Depan')->nullable();
            $table->string('Nama_Belakang')->nullable();
            $table->string('Email_Admin')->nullable()->index('Email_Admin');
            $table->text('Alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
