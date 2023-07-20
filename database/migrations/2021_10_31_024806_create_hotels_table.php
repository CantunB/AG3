<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('zona');
            $table->foreignId('id_zona')->constrained('zona')->onDelete('cascade');
            $table->string('country',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('municipio',100)->nullable();
            $table->string('localidad')->nullable();
            $table->string('hotel',120)->nullable();
            $table->string('address')->nullable();
            $table->string('cp',5)->nullable();
            $table->string('telephone')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
