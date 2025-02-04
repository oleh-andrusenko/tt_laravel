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
            $table->string('model');
            $table->string('year');
            $table->unsignedBigInteger('mileage');
            $table-> string('engine');
            $table-> string('drive');
            $table-> string('transmission');
            $table->float('rent_price');
            $table->string('body_type');
            $table->string('preview_photo')->nullable()->default('default-preview.png');
            $table->longText('photos')->nullable()->default(null);
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
