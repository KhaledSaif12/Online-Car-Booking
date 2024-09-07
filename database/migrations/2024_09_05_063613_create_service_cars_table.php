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
        Schema::create('service_cars', function (Blueprint $table) {
            // Relationships
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('ServiceID')->on('services')->onDelete('cascade');

            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('CarID')->on('cars')->onDelete('cascade');

            // Composite Primary Key
            $table->primary(['service_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_cars');
    }
};
