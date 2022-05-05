<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelLoadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_load', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_operator')->constrained('operators')->cascadeOnDelete();
            $table->foreignId('id_unit')->constrained('units')->cascadeOnDelete();
            $table->unsignedBigInteger('mileage');
            $table->float('liters');
            $table->float('amount',8,2);
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
        Schema::dropIfExists('fuel_load');
    }
}
