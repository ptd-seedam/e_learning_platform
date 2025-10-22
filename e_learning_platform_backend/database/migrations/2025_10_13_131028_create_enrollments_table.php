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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('EnrollmentId');
            $table->foreignId('CourseId')->constrained('courses', 'CourseId')->onDelete('cascade');
            $table->foreignId('UserId')->constrained('users', 'USER_UDID')->onDelete('cascade');
            $table->date('EnrollDate');
            $table->integer('Progress')->default(0); // Tính theo phần trăm
            $table->timestamps();

            $table->unique(['UserId', 'CourseId']); // Đảm bảo 1 user chỉ đăng ký 1 khóa học 1 lần
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
