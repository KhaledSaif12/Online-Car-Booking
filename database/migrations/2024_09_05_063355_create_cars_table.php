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
            $table->id(); // Adjusted to match foreign key references

            $table->string('Model');
            $table->string('Brand');
            $table->enum('Size', ['Small', 'Medium', 'Large', 'SUV']);
            $table->enum('Transmission', ['Manual', 'Automatic']);
            $table->enum('FuelType', ['Petrol', 'Diesel', 'Electric']);
            $table->integer('Seats');
            $table->integer('Mileage');
            $table->decimal('PricePerDay', 10, 2);
            $table->string('ImageURL')->nullable();
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
