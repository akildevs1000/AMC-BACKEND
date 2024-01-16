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
        Schema::dropIfExists('form_entries');

        Schema::create('form_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("work_id")->default(0);
            $table->string("work_type")->default("amc");
            $table->longText("summary");
            $table->string("before_attachment")->nullable();
            $table->string("after_attachment")->nullable();
            $table->unsignedBigInteger("service_call_id")->default(0);
            $table->unsignedBigInteger("equipment_category_id")->default(0);
            $table->unsignedBigInteger("technician_id")->default(0);
            $table->timestamp("date");
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
        Schema::dropIfExists('form_entries');
    }
};
