<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_hotels', function (Blueprint $table) {
            $table->id();
            //$table->integer('id_zona')->unsigned()->change();
            //$table->integer('type_unit_id')->unsigned()->change();
            //$table->integer('type_trip_id')->unsigned()->change();

            // $table->integer('id_zona')->references('zona')->on('hotels');
            $table->foreignId('id_zona')->constrained('zona')->onDelete('cascade');

            $table->integer('type_unit_id')->references('id')->on('type_units');
            $table->integer('type_trip_id')->references('id')->on('type_trips');
            $table->float('MXN')->nullable();
            // $table->float('USD')->nullable();
            // $table->float('EUR')->nullable();
            // $table->float('RUB')->nullable();
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
        Schema::dropIfExists('tariff_hotels');
    }
}
