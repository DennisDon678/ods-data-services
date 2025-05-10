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
        Schema::create('airtime_discounts', function (Blueprint $table) {
            $table->id();
            $table->decimal('mtn', 5, 2)->default(0);
            $table->decimal('glo', 5, 2)->default(0);
            $table->decimal('airtel', 5, 2)->default(0);
            $table->decimal('mobile', 5, 2)->default(0);
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
        Schema::dropIfExists('airtime_discounts');
    }
};
