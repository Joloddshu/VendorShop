<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_Settings', function (Blueprint $table) {
            $table->increments('setting_id')->unsigned();
            $table->string('top_header_title');
            $table->string('top_header_email');
            $table->string('top_header_contact_number');
            $table->string('site_logo');
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
        Schema::dropIfExists('websiteSetting');
    }
}
