<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUnitsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units_images', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('photo_car_insurance')->nullable();
            $table->string('photo_front_unit')->nullable();
            $table->string('photo_rear_unit')->nullable();
            $table->string('photo_right_unit')->nullable();
            $table->string('photo_left_unit')->nullable();
            $table->string('photo_inside_unit_1')->nullable();
            $table->string('photo_inside_unit_2')->nullable();
            $table->string('photo_inside_unit_3')->nullable();
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
        Schema::dropIfExists('units_images');
    }
}
