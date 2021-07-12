<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string("coupon_code")->nullable();
            $table->text("description")->nullable();
            $table->string("amount_type")->nullable();
            $table->string("amount")->nullable();
            $table->string("expiry_date")->nullable();
            $table->string("minimum_spend")->nullable();
            $table->string("maximum_spend")->nullable();
            $table->string("use_limit_per_coupon")->nullable();
            $table->string("use_limit_per_user")->nullable();

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
        Schema::dropIfExists('coupons');
    }
}
