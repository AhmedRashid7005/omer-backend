<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberPackageNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_package_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('arabic_name')->nullable();
            $table->string('price_in_dolar')->nullable();
            $table->string('price_in_saudi_riyal')->nullable();
            $table->string('number_of_days')->nullable();
            $table->string('display_position')->nullable();
            $table->string('suit_identity')->nullable();
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
        Schema::dropIfExists('subscriber_package_names');
    }
}
