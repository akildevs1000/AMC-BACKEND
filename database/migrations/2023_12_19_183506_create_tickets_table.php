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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("description")->nullable();
            $table->string("status")->nullable();
            $table->string("ticket_open_date_time")->nullable();
            $table->string("ticket_close_date_time")->nullable();
            $table->string("attachment")->nullable();
            $table->unsignedBigInteger("priority_id")->default(0);
            $table->unsignedBigInteger("user_id")->default(0);
            $table->unsignedBigInteger("branch_id")->default(0);
            $table->unsignedBigInteger("company_id")->default(0);
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
        Schema::dropIfExists('tickets');
    }
};
