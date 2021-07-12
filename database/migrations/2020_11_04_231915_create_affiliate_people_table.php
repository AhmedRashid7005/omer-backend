<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_people', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->string("name");
            $table->string("email")->nullable();
            $table->string("identity_num")->nullable();
            $table->longText("price");
            $table->string("valid_time_limit")->comment("date_range or forever");
            $table->longText("affiliate_link")->nullable();
            $table->longText("total_client_commission")->nullable();
            $table->longText("total_affiliate_num")->nullable();
            $table->string('type')->nullable();
            $table->integer('affiliate_groups_id')->nullable();
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
        Schema::dropIfExists('affiliate_people');
    }
}
