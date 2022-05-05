<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedServicesStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_services_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_assigned')
                ->constrained('assigned_registers')
                // ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('status')->nullable();
            $table->time('aware')->nullable();
            $table->time('slope')->nullable();
            $table->time('on_board')->nullable();
            $table->string('passenger_number')->nullable();
            $table->string('bag_number')->nullable();
            $table->time('start')->nullable();
            $table->time('finalized')->nullable();
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
        Schema::dropIfExists('assigned_services_status');
    }
}
