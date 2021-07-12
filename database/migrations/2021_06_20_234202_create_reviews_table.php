<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operation_number'); //CR-546464
            $table->integer('user_id');
            $table->string('bill_number');
            $table->string('ontime');
            $table->string('covered');
            $table->string('identical');
            $table->string('recommend');
            $table->string('title');
            $table->Text('content');
            $table->string('photos');
            $table->string('shareLinks');
            $table->string('share');
            $table->string('status')->default('new');
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
        Schema::dropIfExists('reviews');
    }
}
