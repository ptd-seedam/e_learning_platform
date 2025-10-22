<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'CourseId';
    protected $fillable = [
        'Title', 'Description', 'Price', 'ImageUrl', 'TeacherId', 'Status'
    ];

    // Giáo viên của khóa học
    public function teacher()
    {
        return $this->belongsTo(User::class, 'TeacherId', 'USER_UDID');
    }

    // Các bài học thuộc khóa học
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'CourseId', 'CourseId');
    }

    // Đăng ký của học viên vào khóa học
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'CourseId', 'CourseId');
    }

    // Các lớp học trực tuyến thuộc khóa học
    public function liveClasses()
    {
        return $this->hasMany(LiveClass::class, 'CourseId', 'CourseId');
    }

    // Các bài đánh giá về khóa học
    public function reviews()
    {
        return $this->hasMany(Review::class, 'CourseId', 'CourseId');
    }
}
