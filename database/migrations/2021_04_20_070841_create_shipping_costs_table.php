<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->text("delivery_type")->nullable()->comment("international, local_delivery, local_receipt");
            $table->text("subscriber_package_name_id")->nullable();
            $table->text("company_name")->nullable();
            $table->text("shipping_form")->nullable();
            $table->text("shipping_to")->nullable();
            $table->text("method_type")->nullable()->comment("delivery, receipt");
            $table->text("method")->nullable();
            $table->text("during_time")->nullable();
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
        Schema::dropIfExists('shipping_costs');
    }
}
