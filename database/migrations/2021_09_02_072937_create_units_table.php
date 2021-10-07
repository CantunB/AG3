<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->string('type');
            $table->string('plate_number');
            $table->string('circulation_card')->nullable();
            $table->string('car_insurance')->nullable();
            $table->string('file_plate_number')->nullable();
            $table->string('file_circulation_card')->nullable();
            $table->string('file_car_insurance')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('units');
    }
}
