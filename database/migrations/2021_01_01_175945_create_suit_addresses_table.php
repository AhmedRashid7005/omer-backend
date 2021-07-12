<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suit_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->string("country")->nullable();
            $table->string("address")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("house_road_number")->nullable();
            $table->string("phone")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('suit_addresses');
    }
}
