<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->date('active_until');
            $table->foreignId('user_id')->unique()->references('id')->on('users');
            $table->foreignId('plan_id')->unique()->references('id')->on('plans');
            $table->timestamps();
            //$table->foreignId('user_id')->references('id')->on('users');
            //$table->foreignId('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
