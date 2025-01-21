<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carId');
            $table->string('userEmail');
            $table->date('start');
            $table->date('end');
            $table->unsignedInteger('duration');
            $table->float('price');
            $table->string('paymentStatus')->default('pending');
            $table->string('rentStatus')->default('not started');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
