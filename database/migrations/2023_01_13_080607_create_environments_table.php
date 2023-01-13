<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pond_environments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('temperature');
            $table->string('ph');
            $table->unsignedInteger('pond_id');
            $table->foreign('pond_id')->references('id')->on('fish_ponds')->onDelete('cascade');
            $table->unsignedInteger('fish_type');
            $table->foreign('fish_type')->references('id')->on('fish_types')->onDelete('cascade');
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
        Schema::dropIfExists('pond_environments');
    }
}
