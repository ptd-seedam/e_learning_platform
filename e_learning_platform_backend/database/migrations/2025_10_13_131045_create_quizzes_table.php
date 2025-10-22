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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id('QuizId');
            $table->foreignId('LessonId')->constrained('lessons', 'LessonId')->onDelete('cascade');
            $table->string('Title', 255);
            $table->text('Description')->nullable();
            $table->integer('Duration')->nullable(); // Thời gian làm bài (phút)
            $table->integer('PassScore')->default(70); // Điểm đỗ
            $table->string('Status', 50)->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
