<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_materials', function (Blueprint $table) {
            $table->id('MaterialId');
            // M_L: Lesson (Khóa ngoại đến LessonId)
            $table->foreignId('LessonId')->constrained('lessons', 'LessonId')->onDelete('cascade');
            $table->string('FileName', 255);
            $table->string('FileUrl');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_materials');
    }
};
