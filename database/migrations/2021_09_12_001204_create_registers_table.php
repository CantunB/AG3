<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('agency_id')->references('id')->on('agencies');
            $table->foreignId('type_service_id')->references('id')->on('type_services');
            $table->foreignId('airline_id')->references('id')->on('airlines');
            $table->string('terminal')->nullable();
            $table->dateTime('flight_time', 0);
            $table->string('destiny')->nullable();
            $table->string('passenger')->nullable();
            $table->string('passenger_number')->nullable();
            $table->dateTime('pickup', 0);
            $table->string('requested_unit');
            $table->string('place_service');
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
        Schema::dropIfExists('registers');
    }
}
