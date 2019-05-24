<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkedLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marked_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('address')->nullable();
            $table->string('latitude');
            $table->string('longitude');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('event');
            $table->string('description');
            $table->boolean('urgent');
            $table->timestampTz('accessible_until')->nullable();
            
            $table->timestampsTz(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marked_locations');
    }
}
