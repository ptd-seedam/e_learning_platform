<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $primaryKey = 'LiveClassId';
    protected $fillable = [
        'CourseId', 'Title', 'StartTime', 'EndTime', 'MeetingLink', 'Description', 'Status'
    ];

    // Khóa học chứa lớp học trực tuyến
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId', 'CourseId');
    }
}
