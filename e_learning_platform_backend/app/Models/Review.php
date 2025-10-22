<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'ReviewId';
    protected $fillable = [
        'CourseId', 'UserId', 'Rating', 'Comment', 'ReviewDate'
    ];

    // Khóa học được đánh giá
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId', 'CourseId');
    }

    // Người dùng viết đánh giá
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'USER_UDID');
    }
}
