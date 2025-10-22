<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewId');
            // C_R: Course (Khóa ngoại đến CourseId)
            $table->foreignId('CourseId')->constrained('courses', 'CourseId')->onDelete('cascade');
            // User_r: User (Khóa ngoại đến USER_UDID)
            $table->foreignId('UserId')->constrained('users', 'USER_UDID')->onDelete('cascade');
            $table->integer('Rating')->min(1)->max(5);
            $table->text('Comment')->nullable();
            $table->date('ReviewDate');
            $table->timestamps();

            // Ràng buộc duy nhất: Một User chỉ đánh giá một Course một lần
            $table->unique(['UserId', 'CourseId']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
