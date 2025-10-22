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
        Schema::create('test_attempts', function (Blueprint $table) {
            $table->id('AttemptId');
            // Liên kết với Enrollment (đăng ký khóa học) (T_E)
            $table->foreignId('EnrollmentId')->constrained('enrollments', 'EnrollmentId')->onDelete('cascade');
            // Liên kết với Quiz (Q_T)
            $table->foreignId('QuizId')->constrained('quizzes', 'QuizId')->onDelete('cascade');
            $table->dateTime('AttemptDate');
            $table->decimal('Score', 5, 2)->nullable();
            $table->string('Status', 50)->default('Pending'); // Ví dụ: Pending, Completed, Failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_attempts');
    }
};
