<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->references('id')->on('users');
            $table->string('name');
            $table->string('last_name');
            $table->string('number_identication');
            $table->string('type_identication');
            $table->string('photo');
            $table->string('age');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('neighborhood');//barrio
            $table->string('email');
            $table->string('num_phone');
            $table->string('city')->nullable();
            $table->string('department')->nullable();
            $table->integer('is_owner');
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
