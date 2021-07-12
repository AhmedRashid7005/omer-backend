<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//Manual
class CreateTransferConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_confirms', function (Blueprint $table) {
            $table->increments('id');
            //$table->enum('type', ['manual','photo']); //manual / photo
            $table->string('operation_number');
            $table->string('account_owner_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('amount');
            $table->string('purpose');
            $table->string('date'); //2000-01-01 11:00:00
            $table->string('photo');
            $table->integer('user_id');
            $table->string('status')->default('new'); //new - done - refused
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
        Schema::dropIfExists('transfer_confirms');
    }
}
