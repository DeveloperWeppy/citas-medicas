<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->references('id')->on('users');
            $table->string('image_banner');
            $table->string('nit')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('num_phone')->nullable();
            $table->string('name_contact')->nullable();
            $table->string('num_phone_contact')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('city');
            $table->text('frame_ubication');
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
        Schema::dropIfExists('user_information');
    }
}
