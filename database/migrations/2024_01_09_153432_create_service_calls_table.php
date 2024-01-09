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
        Schema::create('service_calls', function (Blueprint $table) {
            $table->id();
            $table->timestamp("date")->nullable();
            $table->string("schedule_start_date")->nullable();
            $table->string("schedule_end_date")->nullable();
            $table->string("close_date_time")->nullable();
            $table->string("prority_id")->nullable();
            $table->string("status")->nullable();
            $table->unsignedBigInteger("contract_id")->default(0);
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
        Schema::dropIfExists('service_calls');
    }
};
