<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAssigRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assign_registers', function (Blueprint $table) {
            $table->timestamp('start_trip', )->nullable()->after('trip_status');
            $table->timestamp('finish_trip', )->nullable()->after('start_trip');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assign_registers', function (Blueprint $table) {
            $table->dropColumn('start_trip');
            $table->dropColumn('finish_trip');
        });
    }
}
