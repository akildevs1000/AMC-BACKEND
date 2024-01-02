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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("brand_name")->nullable();
            $table->string("model_number")->nullable();
            $table->string("specification")->nullable();
            $table->string("other")->nullable();
            $table->string("software_version")->nullable();
            $table->string("qty")->nullable();
            $table->string("remarks")->nullable();
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
        Schema::dropIfExists('equipment');
    }
};
