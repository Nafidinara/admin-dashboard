<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->bigIncrements('biodata_id');
            $table->unsignedBigInteger('kandidat_id')->unsigned();
            $table->foreign('Kandidat_id')->references('kandidat_id')->on('kandidats')->onDelete('cascade');
            $table->string('visi');
            $table->longText('misi');
            $table->longText('alamat');
            $table->longText('biografi')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telfon')->nullable();
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
        Schema::dropIfExists('biodatas');
    }
}
