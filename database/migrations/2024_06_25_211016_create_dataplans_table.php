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
        Schema::create('dataplans', function (Blueprint $table) {
            $table->id();
            $table->string('data_id');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plan_type_lists')->onDelete('cascade');
            $table->string('size');
            $table->string('validity');
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
        Schema::dropIfExists('dataplans');
    }
};
