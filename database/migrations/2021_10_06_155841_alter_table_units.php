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
            $table->string('invoice_unit')->after('type');
            $table->string('permission_sct')->after('invoice_unit');
            $table->string('contract')->after('permission_sct');
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
            $table->dropColumn('nss');
            $table->dropColumn('curp');
            $table->dropColumn('rfc');
           // $table->dropColumn('ine');
        });
    }
}
