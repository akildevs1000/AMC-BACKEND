<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("comments")->nullable();
            $table->string("dateTime")->nullable();
            $table->string("user_type")->nullable();
            $table->unsignedBigInteger("ticket_id")->default(0);
            $table->unsignedBigInteger("user_id")->default(0);
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
        Schema::dropIfExists('ticket_histories');
    }
};
