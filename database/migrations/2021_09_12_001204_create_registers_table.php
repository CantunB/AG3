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
            $table->string('origin');
            $table->string('terminal')->nullable();
            $table->string('time')->nullable();
            $table->string('duration')->nullable();
            $table->string('flight_number')->nullable();
            $table->time('flight_time', 0)->nullable();
            $table->string('destiny')->nullable();
            $table->string('passenger');
            $table->string('passenger_number')->nullable();
            $table->time('pickup', 0);
            $table->string('requested_unit');
            $table->string('place_service')->nullable();
            $table->string('observations')->nullable();
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
