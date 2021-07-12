<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("order_id")->nullable();
            $table->string("link")->nullable();
            $table->string("name")->nullable();
            $table->longText("description")->nullable();
            $table->string("parts_no")->nullable();
            $table->string("parts_side")->nullable();
            $table->string("price")->nullable();
            $table->string("quantity")->nullable();
            $table->string("size")->nullable();
            $table->string("weight")->nullable();
            $table->string("color")->nullable();
            $table->string("shipping_cost")->nullable();
            $table->string("during_time")->nullable();
            $table->longText("note")->nullable();
            $table->string("quality")->nullable();
            $table->string("product_type")->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
