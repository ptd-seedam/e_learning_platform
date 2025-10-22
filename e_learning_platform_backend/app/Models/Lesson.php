<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $primaryKey = 'LessonId';
    protected $fillable = [
        'CourseId', 'Title', 'VideoUrl', 'MaterialUrl', 'OrderIndex'
    ];

    // Khóa học chứa bài học này
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId', 'CourseId');
    }

    // Tài liệu học tập của bài học
    public function materials()
    {
        return $this->hasMany(LessonMaterial::class, 'LessonId', 'LessonId');
    }

    // Các bài kiểm tra thuộc bài học
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'LessonId', 'LessonId');
    }
}
