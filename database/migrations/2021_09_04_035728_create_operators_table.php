<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('paterno',50)->nullable();
            $table->string('materno',50)->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->date('birthday_date')->nullable();
            $table->string('address')->nullable();
            $table->integer('cp',5)->autoIncrement(false)->unsigned()->nullable();
            $table->string('driver_license')->nullable();
            $table->string('operator_photo')->default('/assets/images/users/user-12.png')->nullable();
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
        Schema::dropIfExists('operators');
    }
}
