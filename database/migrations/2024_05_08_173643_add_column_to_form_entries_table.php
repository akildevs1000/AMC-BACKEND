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
        Schema::table('form_entries', function (Blueprint $table) {
            $table->string("customer_name")->nullable();
            $table->string("customer_phone")->nullable();
            $table->string("customer_sign")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_entries', function (Blueprint $table) {
            //
        });
    }
};
