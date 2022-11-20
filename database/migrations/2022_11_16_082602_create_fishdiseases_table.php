<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishdiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishdiseases', function (Blueprint $table) {
            $table->id('Diseases_Id');
            $table->string('Disease_name');
            //$table->foreign('Pond_Id')
            //->references('id')->on('Fishponds')->onDelete('cascade');
            //$table->foreign('Fish_Id')
            //->references('id')->on('Fishtypes')->onDelete('cascade');
            //$table->foreign('Location_ID')
            //->references('id')->on('Location')->onDelete('cascade');
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
        Schema::dropIfExists('fishdiseases');
    }
}
