<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_operation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_operator')->constrained('operators')->cascadeOnDelete();
            $table->foreignId('id_unit')->constrained('units')->cascadeOnDelete();
            $table->string('operation');
            $table->time('time');
            $table->unsignedBigInteger('mileage');
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
        Schema::dropIfExists('service_operation');
    }
}
