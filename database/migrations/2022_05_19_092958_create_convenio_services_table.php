<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenioServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convenio_id')->references('id')->on('convenios');
            $table->foreignId('service_id')->references('id')->on('services');
            $table->integer('price_normal')->unsigned();
            $table->integer('price_discount')->unsigned()->nullable();
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
        Schema::dropIfExists('convenio_services');
    }
}
