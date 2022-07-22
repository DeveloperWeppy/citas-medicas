<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesFreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_frees', function (Blueprint $table) {
            $table->id();
            $table->integer('duration_in_days');
            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->foreignId('service_id')->references('id')->on('services');
            $table->foreignId('convenio_id')->references('id')->on('convenios');
            $table->index(['plan_id', 'service_id','convenio_id']);
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
        Schema::dropIfExists('services_frees');
    }
}
