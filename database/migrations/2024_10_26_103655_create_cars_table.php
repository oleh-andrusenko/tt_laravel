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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->unsignedBigInteger('mileage');
            $table-> string('engine');
            $table-> string('transmission');
            $table->float('price');
            $table->string('preview');
            $table->string('body');
            $table->unsignedInteger('likes')->default(0);
            $table->longText('photos')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->boolean('inRent')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
