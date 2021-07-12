<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransferWithdrawModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfer_withdraw_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string("BankName");
            $table->string("accountName");
            $table->string("iban");
            $table->integer("amount");
            $table->string("photo");
            $table->string("relationship");
            $table->string("status")->default('new'); //new accept refuse
            $table->string("reason")->nullable(); //new accept refuse
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
        Schema::dropIfExists('bank_transfer_withdraw_models');
    }
}
