<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePonddiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pond_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pond_id');
            $table->foreign('pond_id')->references('id')->on('fish_ponds')->onDelete('cascade');
            $table->unsignedInteger('fish_disease');
            $table->foreign('fish_disease')->references('id')->on('fish_diseases')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('pond_diseases');
    }
}
