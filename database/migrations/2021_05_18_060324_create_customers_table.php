<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("user_name");
            $table->tinyInteger("name_number")->nullable();
            $table->string('email')->unique();
            $table->tinyInteger("email_number")->nullable();
            $table->string('password');
            $table->tinyInteger("password_number")->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger("gender_number")->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger("image_number")->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger("address_number")->nullable();
            $table->string('hobby')->nullable();
            $table->tinyInteger("hobby_number")->nullable();
            $table->string('other')->nullable();
            $table->tinyInteger("other_number")->nullable();
            
            $table->string('correspond')->nullable();
            $table->tinyInteger("correspond_public_number")->nullable();
            $table->tinyInteger("correspond_mail_number")->nullable();
            $table->string('information')->nullable();
            $table->tinyInteger("information_public_number")->nullable();
            $table->tinyInteger("information_mail_number")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
