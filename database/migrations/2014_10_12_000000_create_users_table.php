<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->string('name');
            $table->string('name2')->nullable();
            $table->string('fullName')->nullable();
            $table->string('email')->unique();
            $table->longText("affiliate_link")->nullable();
            $table->longText("mem_package")->nullable();
            $table->longText("total_client_commission")->nullable();
            $table->longText("me_as_a_guest_discount")->nullable();
            $table->longText("total_affiliate_num")->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('suit')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('mem_fee')->nullable();
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->longText('ship_add_1')->nullable();
            $table->longText('ship_add_1')->nullable();
            $table->string('ship_country')->nullable();
            $table->string('ship_region')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_postal_code')->nullable();
            $table->string('ship_another_number')->nullable();
            $table->string('bill_add_1')->nullable();
            $table->string('bill_add_2')->nullable();
            $table->string('bill_country')->nullable();
            $table->string('bill_same_as_shipping')->nullable();
            $table->string('bill_region')->nullable();
            $table->string('bill_city')->nullable();
            $table->string('bill_postal_code')->nullable();
            $table->string('bill_another_number')->nullable();
            $table->integer('subscriber_package_name_id')->nullable();

            $table->timestamp('last_apperance')->nullable();
            
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
