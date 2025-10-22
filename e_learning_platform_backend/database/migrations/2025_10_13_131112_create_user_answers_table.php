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
       Schema::create('user_answers', function (Blueprint $table) {
            $table->id('UserAnswerId');
            $table->foreignId('AttemptId')->constrained('test_attempts', 'AttemptId')->onDelete('cascade');
            $table->foreignId('QuestionId')->constrained('questions', 'QuestionId')->onDelete('cascade');

            // Dùng cho đáp án Trắc nghiệm. Có thể NULL nếu là Tự luận
            $table->foreignId('SelectedOptionId')->nullable()->constrained('answer_options', 'OptionId')->onDelete('cascade');

            // Dùng cho đáp án Tự luận. Có thể NULL nếu là Trắc nghiệm
            $table->text('AnswerText')->nullable();

            $table->timestamps();

            $table->unique(['AttemptId', 'QuestionId']); // Đảm bảo tính duy nhất
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
