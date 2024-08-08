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
        Schema::create('manual_fundings', function (Blueprint $table) {
            $table->id();
            $table->string('account_name')->default('ods');
            $table->string('account_number')->default('1234567890');
            $table->string('bank_name')->default('ods Bank');
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
        Schema::dropIfExists('manual_fundings');
    }
};
