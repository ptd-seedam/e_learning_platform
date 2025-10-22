<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    use HasFactory;

    protected $primaryKey = 'OptionId';
    protected $fillable = [
        'QuestionId', 'OptionText', 'IsCorrect'
    ];

    // Câu hỏi mà đáp án này thuộc về
    public function question()
    {
        return $this->belongsTo(Question::class, 'QuestionId', 'QuestionId');
    }

    // Các câu trả lời của người dùng đã chọn đáp án này
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'SelectedOptionId', 'OptionId');
    }
}
