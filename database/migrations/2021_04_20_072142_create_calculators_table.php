<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->string("module_name")->nullable()->comment("commission_fess, insurance, bill_correction, cash_back, pay_later, installment, points");
            $table->string("for")->nullable()->comment("broker, import, auto_parts, protections, gLobal_shipping, local_delivery, receipt, import, bill_correction, cash_back_pay_via, pay_later, installment, points");
            $table->string("subscriber_package_name_id")->nullable();
            $table->string("from")->nullable();
            $table->string("to")->nullable();
            $table->string("amount_type")->nullable();
            $table->string("amount")->nullable();
            $table->string("module_for")->nullable();
            $table->integer("data_from")->nullable();
            $table->integer("data_to")->nullable();
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
        Schema::dropIfExists('calculators');
    }
}
