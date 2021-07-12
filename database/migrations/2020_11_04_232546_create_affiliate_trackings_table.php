<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_trackings', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->string("affiliate_belong_to")->comment("client_group_or_person")->nullable();
            $table->unsignedInteger('client_id')->index()->nullable();
            $table->unsignedInteger('guest_id')->index()->nullable();
            $table->unsignedInteger('guest_select_package_id')->index()->nullable();
            $table->unsignedInteger('affiliate_group_id')->index()->nullable();
            $table->unsignedInteger('affiliate_person_id')->index()->nullable();
            $table->longText('client_commission')->index()->nullable();
            $table->longText('guest_discount')->index()->nullable();
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
        Schema::dropIfExists('affiliate_trackings');
    }
}
