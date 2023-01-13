<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {
            $table->id('entry_id');
            $table->string('temperature');
            $table->string('turbidity');
            $table->string('dissolved_oxygen');
            $table->string('ph');
            $table->string('ammonia');
            $table->string('nitrate');
            $table->string('population');
            $table->string('fish_length');
            $table->string('fish_weight');
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
        Schema::dropIfExists('recordings');
    }
}
