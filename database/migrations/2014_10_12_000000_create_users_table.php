<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('paterno',50)->nullable();
            $table->string('materno',50)->nullable();
            $table->string('phone',10)->unique()->nullable();
            $table->string('email')->unique();
            $table->date('birthday_date')->nullable();
            $table->string('address')->nullable();
            $table->integer('cp',5)->autoIncrement(false)->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('status')->default('1');
            $table->string('photo_user')->default('/assets/images/users/user-profile.png');
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
        Schema::dropIfExists('users');
    }
}
