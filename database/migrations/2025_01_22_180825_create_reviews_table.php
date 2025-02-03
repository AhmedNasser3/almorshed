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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->integer('rating')->default(0); // التقييم بالنجوم
            $table->string('doctor_id')->constrained('doctors')->onDelete('cascade'); // معرّف الطبيب الذي يتم تقييمه
            $table->string('user_id')->constrained('users')->onDelete('cascade'); // معرّف المستخدم الذي يكتب التقييم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};