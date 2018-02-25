<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
           $table->unsignedInteger('user_id');
           $table->unsignedInteger('product_id');
           $table->integer('quantity');
           $table->integer('ischecked')->default('0');
           $table->foreign('user_id')->references('id')->on('users');
           $table->foreign('product_id')->references('product_id')->on('products');
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
        Schema::dropIfExists('carts');
    }
}
