<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id('LiveClassId');
            // C_LC: Course (Khóa ngoại đến CourseId)
            $table->foreignId('CourseId')->constrained('courses', 'CourseId')->onDelete('cascade');
            $table->string('Title', 255);
            $table->dateTime('StartTime');
            $table->dateTime('EndTime');
            $table->string('MeetingLink');
            $table->text('Description')->nullable();
            $table->string('Status', 50)->default('Scheduled'); // Ví dụ: Scheduled, Live, Completed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
