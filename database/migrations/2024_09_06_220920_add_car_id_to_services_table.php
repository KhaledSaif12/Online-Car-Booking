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
        Schema::table('services', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('car_id')->after('location_id')->unique(); // إضافة العمود وجعله فريدًا

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->dropUnique(['car_id']); // حذف قيد الفريدة
            $table->dropColumn('car_id'); // حذف العمود
        });
    }
};
