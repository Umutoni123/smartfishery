<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishtypes', function (Blueprint $table) {
            $table->id();
            $table->string('fish_name');
            //$table->unsignedInteger('coopid');
            $table->timestamps();
            //$table->foreign('coopid')->references('id')->on('cooperatives')->onDelete('cascade');
            //$table->unsignedInteger('locationid');
            //$table->foreign('locationid')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishtypes');
    }
}
