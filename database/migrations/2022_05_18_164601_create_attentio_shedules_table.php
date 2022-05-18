<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentioShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentio_shedules', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('open_morning');
            $table->time('close_morning');
            $table->time('open_afternoon');
            $table->time('close_afternoon');
            $table->foreignId('responsable_id')->unique()->references('id')->on('user_information');
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
        Schema::dropIfExists('attentio_shedules');
    }
}
