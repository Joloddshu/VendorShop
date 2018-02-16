<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->string('product_image');
            $table->string('product_thumbnail');
            $table->string('product_description');
            $table->string('product_size');
            $table->string('product_weight');
            $table->string('product_location');
            $table->string('category_id');
            $table->foreign('product_id')->references('order_id')->on('order')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
