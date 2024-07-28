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
        Schema::create('cable_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->string('plan_name');
            $table->unsignedBigInteger('cable_id');
            $table->foreign('cable_id')->references('id')->on('cable_lists')->onDelete('cascade');
            $table->string('price');
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
        Schema::dropIfExists('cable_plans');
    }
};
