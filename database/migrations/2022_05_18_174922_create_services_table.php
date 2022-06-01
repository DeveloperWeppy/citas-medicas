<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 500);
            $table->integer('price_normal')->unsigned();
            $table->integer('price_discount')->unsigned()->nullable();
            $table->integer('percentage_discount')->unsigned()->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('observation', 500)->nullable();
            $table->integer('status')->default(1);
            $table->foreignId('category_id')->references('id')->on('category_services');
            $table->foreignId('specialty_id')->nullable()->references('id')->on('specialties');
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
        Schema::dropIfExists('services');
    }
}
