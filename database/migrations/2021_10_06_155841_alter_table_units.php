<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->string('brand')->after('type')->nullable();
            $table->string('model')->after('brand')->nullable();
            $table->string('frame')->after('model')->nullable();
            $table->string('engines')->after('frame')->nullable();
            $table->float('total_price')->after('engines')->nullable();
            $table->string('file_invoice_unit')->after('total_price')->nullable();
            $table->string('file_permission_sct')->after('file_invoice_unit')->nullable();
            $table->string('file_contract')->after('file_permission_sct')->nullable();
            //$table->string('ine')->after('rfc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn('brand');
            $table->dropColumn('model');
            $table->dropColumn('frame');
            $table->dropColumn('engines');
            $table->dropColumn('total_price');
            $table->dropColumn('file_invoice_unit');
            $table->dropColumn('file_permission_sct');
            $table->dropColumn('file_contract');
        });
    }
}
