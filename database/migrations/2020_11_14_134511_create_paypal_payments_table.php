<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_payments', function (Blueprint $table) {
           // $table->id();
           $table->increments('id');
 
           $table->unsignedInteger('client_id')->index()->nullable();
            $table->longText('user_select_package_name')->nullable();
            $table->longText('payment_valid_till')->nullable();
            $table->longText('paymentId')->nullable();
            $table->longText('PayerID')->nullable();
            $table->longText('invoiceNumber')->nullable();
            $table->timestamps();
            $table->timestamp("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal_payments');
    }
}
