<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('Available')->default(0);
            $table->integer('Required')->default(0);
            $table->integer('Withdraw')->default(0);
            $table->integer('Pending')->default(0);
            $table->integer('Receivable')->default(0);
            $table->integer('Used')->default(0);
            $table->integer('Points')->default(0);
            $table->integer('Loan')->default(0);

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
        Schema::dropIfExists('balances');
    }
}
