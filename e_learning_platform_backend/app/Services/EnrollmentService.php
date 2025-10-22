<?php

namespace App\Services;

use App\Repositories\Eloquent\EnrollmentRepository;

class EnrollmentService extends BaseService
{
    private $enrollmentRepository;

    public function __construct(EnrollmentRepository $enrollmentRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
    }
}
