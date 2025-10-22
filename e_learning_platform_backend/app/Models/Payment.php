<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'PAYMENTID';
    protected $fillable = [
        'EnrollmentId', 'Amount', 'PaymentDate', 'PaymentMethod', 'Status'
    ];

    // Đơn đăng ký liên quan đến thanh toán này
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'EnrollmentId', 'EnrollmentId');
    }
}
