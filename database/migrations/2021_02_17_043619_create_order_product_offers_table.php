<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("order_product_id")->nullable();
            $table->string("offer_name")->nullable();
            $table->string("offer_price_type")->comment("fixed or Percentage")->nullable();
            $table->string("offer_price_amount")->nullable();
            $table->longText("offer_price_description")->nullable();
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
        Schema::dropIfExists('order_product_offers');
    }
}
