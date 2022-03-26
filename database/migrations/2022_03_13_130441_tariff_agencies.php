<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TariffAgencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_agencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zona');
            $table->integer('id_agency')->references('id')->on('agencies')->nullable();
            $table->integer('type_unit')->references('id')->on('type_units')->nullable();
            $table->string('place_service')->nullable();
            $table->float('tariff')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_agencies');
    }
}
