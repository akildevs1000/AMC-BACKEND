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
        Schema::table('trade_licenses', function (Blueprint $table) {
            $table->string("trn_number")->nullable();
            $table->string("issued_by")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_licenses', function (Blueprint $table) {
            $table->dropColumn('trn_number');
            $table->dropColumn('issued_by');
        });
    }
};
