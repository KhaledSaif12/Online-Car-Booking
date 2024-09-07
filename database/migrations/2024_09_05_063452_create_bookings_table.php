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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('CarID')->on('cars')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('ServiceID')->on('services')->onDelete('set null');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('LocationID')->on('locations')->onDelete('set null');

            // Other fields
            $table->date('Date');
            $table->enum('Status', ['Pending', 'Confirmed', 'Cancelled']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
