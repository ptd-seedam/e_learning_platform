<?php

namespace App\Services;

use App\Repositories\Eloquent\PaymentRepository;

class PaymentService extends BaseService
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }
}
