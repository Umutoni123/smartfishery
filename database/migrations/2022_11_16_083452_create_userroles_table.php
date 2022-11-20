<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userroles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->text('description');
            $table->unsignedInteger('locationid');
            $table->foreign('locationid')->references('id')->on('locations')->onDelete('cascade');
            //$table->foreign('Location_ID')
            //->references('id')->on('Location')->onDelete('cascade');
            //$table->foreign('coop_ID')
            //->references('id')->on('cooperatives')->onDelete('cascade');
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
        Schema::dropIfExists('userroles');
    }
}
