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
            $table->unsignedBigInteger('location_id')->nullable()->after('price'); // إضافة LocationID
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null'); // ربط foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['location_id']); // حذف الـ foreign key
            $table->dropColumn('location_id'); // حذف العمود
        });
    }
};
