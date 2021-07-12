<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("invoice_no")->nullable();
            $table->string("order_no")->nullable();
            $table->longText("sender_address")->nullable();
            $table->longText("receiver_address")->nullable();
            $table->string("delivery_through")->nullable();
            $table->string("carrier_name")->nullable();
            $table->string("remaining_order_amount")->nullable();
            $table->string("shipping_cost_warehouse")->nullable();
            $table->string("delivery_cost_to_your_address")->nullable();
            $table->string("other_fees_name")->nullable();
            $table->string("other_fees_value")->nullable();
            $table->string("insurence_fee")->nullable();
            $table->string("custom_duities")->nullable();
            $table->string("vat")->nullable();
            $table->string("discount_type")->nullable();
            $table->string("discount_amount")->nullable();
            $table->string("total")->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
