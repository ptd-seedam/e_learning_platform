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
         Schema::create('courses', function (Blueprint $table) {
            $table->id('CourseId');
            $table->string('Title', 255);
            $table->text('Description')->nullable();
            $table->decimal('Price', 8, 2);
            $table->string('ImageUrl')->nullable();
            // Khóa ngoại TeacherId -> users.USER_UDID
            $table->foreignId('TeacherId')->constrained('users', 'USER_UDID')->onDelete('cascade');
            $table->string('Status', 50)->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
