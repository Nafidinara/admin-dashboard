<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileKandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_kandidats', function (Blueprint $table) {
            $table->bigIncrements('file_kandidat_id');
            $table->unsignedBigInteger('kandidat_id');
            $table->foreign('kandidat_id')->references('kandidat_id')->on('kandidats')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('file_id')->on('files')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('file_kandidats');
    }
}
