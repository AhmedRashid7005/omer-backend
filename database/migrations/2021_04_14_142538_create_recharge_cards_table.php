<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechargeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string("state")->nullable();
            $table->string("card_number")->nullable();
            $table->string("amount")->nullable();
            $table->string("card_expiry")->nullable();
            $table->string('password');
            $table->string("status")->nullable()->comment("Active/DeActive");
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
        Schema::dropIfExists('recharge_cards');
    }
}
