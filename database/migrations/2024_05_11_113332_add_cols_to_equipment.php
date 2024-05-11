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

            $table->string("recorder_brand")->nullable();
            $table->string("recorder_qty")->nullable();
            $table->string("recorder_capacity")->nullable();

            $table->string("work_station")->nullable();
            $table->string("work_station_qty")->nullable();

            $table->string("camera")->nullable();
            $table->string("camera_qty")->nullable();

            $table->string("monitor")->nullable();
            $table->string("monitor_qty")->nullable();

            $table->string("ups")->nullable();
            $table->string("ups_qty")->nullable();
            $table->string("ups_specs")->nullable();

            $table->string("network")->nullable();
            $table->string("network_qty")->nullable();
            $table->string("network_specs")->nullable();
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

            $table->dropColumn("recorder_brand");
            $table->dropColumn("recorder_qty");
            $table->dropColumn("recorder_capacity");

            $table->dropColumn("work_station");
            $table->dropColumn("work_station_qty");

            $table->dropColumn("camera");
            $table->dropColumn("camera_qty");

            $table->dropColumn("monitor");
            $table->dropColumn("monitor_qty");

            $table->dropColumn("ups");
            $table->dropColumn("ups_qty");
            $table->dropColumn("ups_specs");

            $table->dropColumn("network");
            $table->dropColumn("network_qty");
            $table->dropColumn("network_specs");
            
        });
    }
};
