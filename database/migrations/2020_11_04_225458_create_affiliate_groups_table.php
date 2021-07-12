<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_groups', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->unsignedInteger('affiliate_type_id')->index();
            $table->longText("price");
            $table->string("valid_time_limit")->comment("date_range or forever");
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
        Schema::dropIfExists('affiliate_groups');
    }
}
