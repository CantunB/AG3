<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('paterno');
            $table->string('materno')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->integer('country_id')->references('zona')->on('countries');
            $table->integer('state_id')->references('zona')->on('states');
            $table->string('type_service');
            $table->string('type_trip');
            $table->string('origin');
            $table->string('destiny');
            $table->integer('passengers');
            $table->string('airline_arrival')->nullable();
            $table->string('flight_number_arrival')->nullable();
            $table->date('date_arrival')->nullable();
            $table->time('time_arrival')->nullable();
            $table->string('comments_arrival')->nullable();
            $table->string('round_service')->nullable();
            $table->string('airline_departure')->nullable();
            $table->string('flight_number_departure')->nullable();
            $table->date('date_departure')->nullable();
            $table->time('time_departure')->nullable();
            $table->string('comments_departure')->nullable();
            $table->foreignId('request_unit')->constrained('type_units');
            $table->float('price')->nullable();
            $table->string('divisa')->nullable();
            $table->string('type_payment')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('paypal_id')->nullable();
            $table->tinyInteger('status_payment')->default('0');
            $table->tinyInteger('status_booking')->default('0');
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
        Schema::dropIfExists('bookings');
    }
}
