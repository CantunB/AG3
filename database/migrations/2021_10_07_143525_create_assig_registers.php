<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_register')->constrained('registers');
            $table->foreignId('id_unit')->constrained('units');
            $table->foreignId('id_operator')->constrained('operators');
            $table->float('price')->nullable();
            $table->float('cash')->nullable();
            $table->float('usd')->nullable();
            $table->string('invoice')->nullable();
            $table->string('observations')->nullable();
            $table->tinyInteger('payment')->default('0');
            $table->tinyInteger('service')->default('0');
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
        Schema::dropIfExists('assign_registers');
    }
}
