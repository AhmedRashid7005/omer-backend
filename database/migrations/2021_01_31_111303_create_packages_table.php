<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string("package_no")->nullable();
            $table->string("package_status_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("package_to")->nullable();
            $table->string("shipping_cost")->nullable();
            $table->string("from")->nullable();
            $table->string("to")->nullable();
            $table->string("tracking_no")->nullable();
            $table->string("weight")->nullable();
            $table->longText("note")->nullable();
            $table->longText("other_fees_name")->nullable()->comment("other fees name as json");
            $table->longText("other_fees_value")->nullable()->comment("other fees value as json");
            $table->integer('sended')->default(0);
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
        Schema::dropIfExists('packages');
    }
}
