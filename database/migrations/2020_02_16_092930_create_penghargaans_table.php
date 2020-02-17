<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghargaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->bigIncrements('penghargaan_id');
            $table->unsignedBigInteger('kandidat_id')->unsigned();
            $table->foreign('Kandidat_id')->references('kandidat_id')->on('kandidats')->onDelete('cascade');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('kredensial');
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
        Schema::dropIfExists('penghargaans');
    }
}
