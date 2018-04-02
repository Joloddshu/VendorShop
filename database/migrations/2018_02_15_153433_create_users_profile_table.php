<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->unsignedInteger('user_id');
            $table->string('city')->default('Null');
            $table->string('country')->default('Null');
            $table->string('zipcode')->default('Null');
            $table->string('streetaddress')->default('Null');
            $table->string('profileimage')->default('Null');
            $table->string('dateofbirth')->default('Null');
            $table->string('bio')->default('Null');
            $table->double('balance')->default('0');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
