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
            $table->string("actual_problem")->nullable();
            $table->string("action_taken")->nullable();
            $table->string("description")->nullable(); //findings by technician
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
            $table->dropColumn("actual_problem");
            $table->dropColumn("action_taken");
            $table->dropColumn("description");
        });
    }
};
