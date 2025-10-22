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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('QuestionId');
            $table->foreignId('QuizId')->constrained('quizzes', 'QuizId')->onDelete('cascade');
            $table->text('QuestionText');
            $table->string('QuestionType', 50); // MCQ, Essay (Tự luận)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
