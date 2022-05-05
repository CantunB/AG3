<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_register')->constrained('registers')->onDelete('cascade');;
            $table->foreignId('id_unit')->constrained('units')->onDelete('cascade');
            $table->foreignId('id_operator')->constrained('operators')->onDelete('cascade');
            // $table->float('tariff')->nullable();
            // $table->float('cash')->nullable();
            // $table->float('usd')->nullable();
            // $table->float('euros')->nullable();
            // $table->string('invoice')->nullable();
            // $table->string('service_order_voucher')->nullable();
            // $table->string('no_show_voucher')->nullable();
            // $table->tinyInteger('trip_status')->nullable();
            // $table->string('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_registers');
    }
}
