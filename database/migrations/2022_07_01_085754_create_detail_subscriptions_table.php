<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->references('id')->on('users');
            $table->foreignId('suscription_id')->unique()->references('id')->on('subscriptions');
            $table->string('operation_id');
            $table->string('payer_id');
            $table->string('status_operation');
            $table->dateTime('next_payment_date');
            $table->string('payment_method_id');
            $table->string('payer_first_name');
            $table->string('payer_last_name');
            $table->string('preapproval_plan_id');
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
        Schema::dropIfExists('detail_subscriptions');
    }
}
