<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $primaryKey = 'QuizId';
    protected $fillable = [
        'LessonId', 'Title', 'Description', 'Duration', 'PassScore', 'Status'
    ];

    // Bài học chứa bài kiểm tra
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'LessonId', 'LessonId');
    }

    // Các câu hỏi thuộc bài kiểm tra
    public function questions()
    {
        return $this->hasMany(Question::class, 'QuizId', 'QuizId');
    }

    // Các lần làm bài kiểm tra
    public function testAttempts()
    {
        return $this->hasMany(TestAttempt::class, 'QuizId', 'QuizId');
    }
}
