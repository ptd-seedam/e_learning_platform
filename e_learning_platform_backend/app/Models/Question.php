<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'QuestionId';
    protected $fillable = [
        'QuizId', 'QuestionText', 'QuestionType'
    ];

    // Bài kiểm tra chứa câu hỏi này
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'QuizId', 'QuizId');
    }

    // Các tùy chọn đáp án (dùng cho MCQ)
    public function options()
    {
        return $this->hasMany(AnswerOption::class, 'QuestionId', 'QuestionId');
    }

    // Câu trả lời của học viên cho câu hỏi này
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'QuestionId', 'QuestionId');
    }
}
