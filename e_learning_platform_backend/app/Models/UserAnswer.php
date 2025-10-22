<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $primaryKey = 'UserAnswerId';
    protected $fillable = [
        'AttemptId', 'QuestionId', 'SelectedOptionId', 'AnswerText'
    ];

    // Lần làm bài
    public function attempt()
    {
        return $this->belongsTo(TestAttempt::class, 'AttemptId', 'AttemptId');
    }

    // Câu hỏi
    public function question()
    {
        return $this->belongsTo(Question::class, 'QuestionId', 'QuestionId');
    }

    // Tùy chọn đáp án đã chọn (nếu là trắc nghiệm)
    public function selectedOption()
    {
        return $this->belongsTo(AnswerOption::class, 'SelectedOptionId', 'OptionId');
    }
}
