<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCostWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_cost_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->text("shipping_cost_id")->nullable();
            $table->text("weight_type")->nullable()->comment("exact_weight,range_weight");
            $table->text("from")->nullable();
            $table->text("to")->nullable();
            $table->text("price_for")->nullable()->comment("per_kg,range");
            $table->text("price")->nullable();
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
        Schema::dropIfExists('shipping_cost_weights');
    }
}
