<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string("order_no")->nullable();
            $table->string("user_id")->nullable();
            $table->string("order_type")->comment("Broker, Import, Auto Parts")->nullable();
            $table->string("market_place")->nullable();
            $table->string("shipping_type_from")->comment("Local, Global")->nullable();
            $table->string("from_state_country")->nullable();
            $table->string("shipping_type_to")->comment("Local, Global")->nullable();
            $table->string("to_state_country")->nullable();
            $table->string("shipping_within")->nullable();
            $table->string("item_quantity")->nullable();
            $table->longText("other_cost_name")->nullable();
            $table->longText("other_cost_value")->nullable();
            $table->string("minimum_pay_type")->default("Fixed or Percentages")->nullable();
            $table->string("minimum_pay_amount")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
