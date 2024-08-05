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
        // Schema::create('profits', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('plan_type');
        //     $table->string('profit');
        //     $table->foreign('plan_type')->references('id')->on('plan_type_lists')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profits');
    }
};
