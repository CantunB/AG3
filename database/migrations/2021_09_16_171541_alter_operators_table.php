<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operators',function($table){
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->string('second_email')->nullable()->after('email');
            $table->string('password')->after('email_verified_at');
            $table->rememberToken()->after('password');
            $table->string('birth_certificate')->after('cp');
            $table->string('proof_address')->after('birth_certificate');
            $table->string('nss')->after('proof_address');
            $table->string('curp')->after('nss');
            $table->string('rfc')->after('curp');
            $table->string('ine')->after('rfc');
            //$table->string('operator_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operators', function ($table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('second_email');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('birth_certificate');
            $table->dropColumn('proof_address');
            $table->dropColumn('nss');
            $table->dropColumn('curp');
            $table->dropColumn('rfc');
            $table->dropColumn('ine');
        });

    }
}
