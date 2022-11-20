<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendedTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_treatments', function (Blueprint $table) {
            $table->id('treat_Id');
            $table->timestamps();
            $table->string('treatment_name');
            $table->text('details');
            $table->string('medications');
            //$table->foreign('Diseases_Id')
            //->references('id')->on('Fishdiseases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommended_treatments');
    }
}
