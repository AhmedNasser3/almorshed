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
        Schema::create('doctor_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('available_days'); // الأيام المتاحة للعمل (مثال: "Monday, Wednesday")
            $table->json('available_hours'); // ساعات العمل المتاحة (مثال: ["07:00-09:00", "09:00-12:00"])
            $table->json('unavailable_hours'); // ساعات غير متاحة (مثال: {"Monday": ["13:00-14:00"], "Wednesday": ["17:00-19:00"]})
            $table->string('price'); // سعر الخدمة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_services');
    }
};