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
        Schema::table('equipment', function (Blueprint $table) {

            $table->string("controller_brand")->nullable();
            $table->string("controller_qty")->nullable();
            $table->string("controller_type")->nullable();

            $table->string("reader")->nullable();
            $table->string("reader_qty")->nullable();
            $table->string("reader_type")->nullable();

            $table->string("lock")->nullable();
            $table->string("lock_qty")->nullable();
            $table->string("lock_type")->nullable();

            $table->string("sensor")->nullable();
            $table->string("sensor_qty")->nullable();
            $table->string("sensor_type")->nullable();

            $table->string("keypad")->nullable();
            $table->string("keypad_qty")->nullable();
            $table->string("keypad_type")->nullable();

            $table->string("exit_switch")->nullable();
            $table->string("fire_switch")->nullable();
            $table->string("remote")->nullable();

            $table->string("monitor_type")->nullable();
            $table->string("monitor_size")->nullable();


            $table->string("auto_light")->nullable();
            $table->string("auto_light_qty")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropColumn("controller_brand");
            $table->dropColumn("controller_qty");
            $table->dropColumn("controller_type");

            $table->dropColumn("reader");
            $table->dropColumn("reader_qty");
            $table->dropColumn("reader_type");

            $table->dropColumn("lock");
            $table->dropColumn("lock_qty");
            $table->dropColumn("lock_type");

            $table->dropColumn("sensor");
            $table->dropColumn("sensor_qty");
            $table->dropColumn("sensor_type");

            $table->dropColumn("keypad");
            $table->dropColumn("keypad_qty");
            $table->dropColumn("keypad_type");

            $table->dropColumn("exit_switch");
            $table->dropColumn("fire_switch");
            $table->dropColumn("remote");

            $table->dropColumn("monitor_type");
            $table->dropColumn("monitor_size");


            $table->dropColumn("auto_light");
            $table->dropColumn("auto_light_qty");
        });
    }
};
