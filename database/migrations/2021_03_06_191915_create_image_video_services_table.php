<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageVideoServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_video_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string("service_for")->nullable();
            $table->string("service_type")->nullable();
            $table->string("subscriber_package_name_id")->nullable();
            $table->string("from")->nullable();
            $table->string("to")->nullable();
            $table->string("price")->nullable();
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
        Schema::dropIfExists('image_video_services');
    }
}
