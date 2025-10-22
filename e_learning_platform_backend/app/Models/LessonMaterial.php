<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonMaterial extends Model
{
    use HasFactory;

    protected $primaryKey = 'MaterialId';
    protected $fillable = [
        'LessonId', 'FileName', 'FileUrl'
    ];

    // Bài học mà tài liệu này thuộc về
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'LessonId', 'LessonId');
    }
}
