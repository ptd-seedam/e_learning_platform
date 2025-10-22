<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'USER_UDID';
    public $incrementing = true;

    protected $fillable = [
        'USERNAME',
        'PASSWORD',
        'FULLNAME',
        'ADDRESS',
        'PHONENUMBER',
        'EMAIL',
        'ROLE',
    ];

    protected $hidden = [
        'PASSWORD',
    ];

    public function getJWTIdentifier()
    {
        // Sử dụng khóa chính tùy chỉnh của bạn
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [
            'user_role' => $this->ROLE,
            'email' => $this->EMAIL
        ];
    }

    // Khóa học mà người dùng (giáo viên) này giảng dạy
    public function taughtCourses()
    {
        return $this->hasMany(Course::class, 'TeacherId', 'USER_UDID');
    }

    // Đăng ký khóa học của người dùng (học viên)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'UserId', 'USER_UDID');
    }

    // Các bài đánh giá người dùng đã viết
    public function reviews()
    {
        return $this->hasMany(Review::class, 'UserId', 'USER_UDID');
    }
    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
}
