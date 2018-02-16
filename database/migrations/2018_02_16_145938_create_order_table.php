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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('product_id');
            $table->string('id');
            $table->string('order_amount');
            $table->string('order_quantity');
            $table->string('order_address');
            $table->string('order_city');
            $table->string('order_zipcode');
            $table->string('order_country');
            $table->string('order_state');
            $table->string('order_phone_number');
            $table->string('order_tax');
            $table->string('order_email');
            $table->string('order_tracking_number');
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
