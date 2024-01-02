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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string("date")->nullable();
            $table->string("start_date")->nullable();
            $table->string("expire_date")->nullable();
           
            $table->string("value")->nullable();
            $table->string("attachment")->nullable();
            $table->boolean("status")->default(1);

            $table->unsignedBigInteger("amc_type_id")->default(0);
            $table->unsignedBigInteger("visit_type_id")->default(0);
            $table->unsignedBigInteger("service_call_type_id")->default(0);
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
        Schema::dropIfExists('contracts');
    }
};
