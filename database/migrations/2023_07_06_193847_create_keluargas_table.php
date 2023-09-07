<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('nama_ayah');
            $table->string('status_ayah');
            $table->string('pek_ayah');
            $table->string('pend_ayah');
            $table->string('nama_ibu');
            $table->string('status_ibu');
            $table->string('pek_ibu');
            $table->string('pend_ibu');
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
        Schema::dropIfExists('keluargas');
    }
}
