<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSendEmailNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_send_email_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string("client_id")->nullable();
            $table->string("suit")->nullable();
            $table->text("subject")->nullable();
            $table->longText("body")->nullable();
            $table->string("type")->nullable()->comment("email/notification");
            $table->enum('readed', [0,1])->default(0);
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
        Schema::dropIfExists('client_send_email_notifications');
    }
}
