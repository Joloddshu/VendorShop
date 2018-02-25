<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->double('order_amount');
            $table->unsignedInteger('order_quantity');
            $table->string('order_address');
            $table->string('order_city');
            $table->string('order_zipcode');
            $table->string('order_country');
            $table->string('order_state');
            $table->string('order_phone_number');
            $table->float('order_tax');
            $table->string('order_email');
            $table->string('order_tracking_number');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('order');
    }
}
