<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeemed_services', function (Blueprint $table) {
            $table->id();
            $table->string('code_diagnosis')->nullable();
            $table->foreignId('prestador_id')->references('id')->on('user_information');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('redeemed_services');
    }
}
