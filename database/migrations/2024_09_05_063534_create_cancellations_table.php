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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('BookingID')->on('bookings')->onDelete('cascade');

            // Other fields
            $table->date('CancellationDate');
            $table->decimal('RefundAmount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellations');
    }
};
