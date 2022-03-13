<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('paterno');
            $table->string('materno')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->integer('country_id')->references('zona')->on('countries');
            $table->integer('state_id')->references('zona')->on('states');
            $table->string('type_service');
            $table->string('origin');
            $table->string('destiny');
            $table->integer('passengers');
            $table->date('date_service')->nullable();
            $table->time('time_service')->nullable();
            $table->string('round_service')->nullable();
            $table->date('date_comeback')->nullable();
            $table->time('time_comeback')->nullable();
            $table->foreignId('request_unit')->constrained('type_units');
            $table->foreignId('type_trip')->constrained('type_trips');
            // $table->float('price')->nullable();
            // $table->string('type_payment')->nullable();
            // $table->string('transaction_id')->nullable();
            // $table->string('paypal_id')->nullable();
            // $table->tinyInteger('status_payment')->default('0')->nullable();
            $table->tinyInteger('status_quotes')->default('0')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
