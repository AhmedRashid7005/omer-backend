<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientGroupBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_group_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->string("client_or_group_id")->nullable();
            $table->string("balance_for")->nullable()->comment("client/group");
            $table->string("wallet_status")->nullable();
            $table->string("amount")->nullable();
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
        Schema::dropIfExists('client_group_balances');
    }
}
