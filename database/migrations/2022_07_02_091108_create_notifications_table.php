<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('assign_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('ticket_id')->nullable();
            $table->integer('reply_id')->nullable();
            $table->text('notify_body')->nullable();
            $table->text('route')->nullable();
            $table->integer('read_status')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
