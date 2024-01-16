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
        // Schema::dropIfExists('checklists');

        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("form_entry_id")->default(0);
            $table->string("attachment")->nullable();
            $table->unsignedBigInteger("question_id")->default(0);
            $table->string("selectedOption")->default("N/A");
            $table->string("remarks")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('checklists');
    }
};
