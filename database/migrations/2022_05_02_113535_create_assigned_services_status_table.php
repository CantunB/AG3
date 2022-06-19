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
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('status')->nullable();
            $table->text('comment')->nullable();
            $table->time('aware')->nullable();
            $table->string('coordinates_aware')->nullable();
            $table->time('slope')->nullable();
            $table->string('coordinates_slope')->nullable();
            $table->time('on_board')->nullable();
            $table->string('coordinates_onboard')->nullable();
            $table->time('noshow')->nullable();
            $table->string('coupon')->nullable();
            $table->string('passenger_number')->nullable();
            $table->string('bag_number')->nullable();
            $table->time('start')->nullable();
            $table->string('coordinates_start')->nullable();
            $table->time('finalized')->nullable();
            $table->string('coordinates_finalized')->nullable();
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
