<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedServicesChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_services_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_assigned')
                ->constrained('assigned_registers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('coin');    
            $table->string('waytopay');    
            $table->float('amount',8,2);
            $table->float('tip', 8, 2);
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
        Schema::dropIfExists('assigned_services_charges');
    }
}
