<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAttempt extends Model
{
    use HasFactory;

    protected $primaryKey = 'AttemptId';
    protected $fillable = [
        'EnrollmentId', 'QuizId', 'AttemptDate', 'Score', 'Status'
    ];

    // Đơn đăng ký (học viên) liên quan đến lần làm bài này
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'EnrollmentId', 'EnrollmentId');
    }

    // Bài kiểm tra đã được làm
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'QuizId', 'QuizId');
    }

    // Chi tiết câu trả lời của học viên trong lần làm bài này
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'AttemptId', 'AttemptId');
    }
}
