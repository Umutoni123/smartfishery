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
        Schema::create('environments', function (Blueprint $table) {
            $table->id('Env_Id');
            $table->string('Temperature');
            $table->string('pH');
            //$table->foreign('Pond_Id')
            //->references('id')->on('Fishponds')->onDelete('cascade');
            //$table->foreign('Fish_Id') 
            //->references('id')->on('Fish_types')->onDelete('cascade');
            //$table->foreign('coop_ID')
            //->references('id')->on('cooperatives')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environments');
    }
}
