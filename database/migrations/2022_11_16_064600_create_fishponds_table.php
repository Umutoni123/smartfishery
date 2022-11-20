<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatefishpondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishponds', function (Blueprint $table) {
            $table->id('Pond_Id');
            $table->string('Pond_name');
            $table->unsignedInteger('locationi');
            $table->foreign('locationi')->references('id')->on('locations')->onDelete('cascade');
           // $table->foreign('Fish_Id') 
           // ->references('id')->on('Fish_types')->onDelete('cascade');
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
        Schema::dropIfExists('fishponds');
    }
}
