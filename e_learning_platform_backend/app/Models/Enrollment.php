<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $primaryKey = 'EnrollmentId';
    protected $fillable = [
        'CourseId', 'UserId', 'EnrollDate', 'Progress'
    ];

    // Học viên đăng ký
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'USER_UDID');
    }

    // Khóa học được đăng ký
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId', 'CourseId');
    }

    // Các giao dịch thanh toán cho lần đăng ký này
    public function payments()
    {
        return $this->hasMany(Payment::class, 'EnrollmentId', 'EnrollmentId');
    }

    // Các lần làm bài kiểm tra trong khóa học này
    public function testAttempts()
    {
        return $this->hasMany(TestAttempt::class, 'EnrollmentId', 'EnrollmentId');
    }
}
