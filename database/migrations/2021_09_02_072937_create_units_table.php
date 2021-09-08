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
            $table->string('photo_circulation_card_front')->nullable();
            $table->string('photo_circulation_card_back')->nullable();
            $table->string('car_insurance_number')->nullable();
            $table->string('photo_car_insurance')->nullable();
            $table->string('photo_front_unit')->nullable();
            $table->string('photo_rear_unit')->nullable();
            $table->string('photo_right_unit')->nullable();
            $table->string('photo_left_unit')->nullable();
            $table->string('photo_inside_unit_1')->nullable();
            $table->string('photo_inside_unit_2')->nullable();
            $table->string('photo_inside_unit_3')->nullable();
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
