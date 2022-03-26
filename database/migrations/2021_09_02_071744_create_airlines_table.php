<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            //$table->id();
            $table->string('terminal',10)->nullable();
            $table->string('airport',100)->nullable();
            $table->string('airline',120)->nullable();
            $table->string('iata_code')->nullable();
            $table->string('destiny')->nullable();
            $table->string('code',3)->nullable();
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
        Schema::dropIfExists('airlines');
    }
}
