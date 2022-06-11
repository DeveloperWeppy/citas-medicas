<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFreeClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_free_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_veces_redimir');
            $table->foreignId('id_cliente')->references('id')->on('clients');
            $table->foreignId('id_service_free')->references('id')->on('services');
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
        Schema::dropIfExists('service_free_clients');
    }
}
