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
        Schema::create('answer_options', function (Blueprint $table) {
            $table->id('OptionId');
            // Liên kết với Question (Q_A)
            $table->foreignId('QuestionId')->constrained('questions', 'QuestionId')->onDelete('cascade');
            $table->text('OptionText');
            $table->boolean('IsCorrect')->default(false); // Xác định đáp án đúng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_options');
    }
};
