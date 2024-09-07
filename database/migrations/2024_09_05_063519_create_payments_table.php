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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('BookingID')->on('bookings')->onDelete('cascade');

            // Other fields
            $table->decimal('Amount', 10, 2);
            $table->date('PaymentDate');
            $table->enum('PaymentMethod', ['Credit Card', 'Debit Card', 'Cash', 'UPI']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
