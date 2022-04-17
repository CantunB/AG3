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
            $table->string('type',50);
            $table->string('brand',100)->nullable();
            $table->string('model', 100)->nullable();
            $table->year('year');
            $table->string('color')->nullable();
            $table->string('frame', 100)->nullable();
            $table->string('engines', 100)->nullable();
            $table->float('total_price')->nullable();
            $table->string('sct_permission')->nullable();
            $table->string('sct_plate_number')->nullable();
            $table->date('sct_validity')->nullable();
            $table->string('insurance_carrier',100)->nullable();
            $table->string('insurance_policy')->nullable();
            $table->date('insurance_start_validity')->nullable();
            $table->date('insurance_end_validity')->nullable();
            $table->string('circulation_card_number')->nullable();
            $table->string('tag_number')->nullable();
            $table->string('file_contract')->nullable();
            $table->string('file_invoice_unit')->nullable();
            $table->string('file_invoice_letter')->nullable();
            $table->string('file_permission_sct')->nullable();
            $table->string('file_sct_plate_number')->nullable();
            $table->string('file_insurance_policy')->nullable();
            $table->string('file_circulation_card')->nullable();
            $table->string('file_tag')->nullable();
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
