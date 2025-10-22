<?php

namespace App\Http\Controllers\API;

use App\Services\EnrollmentService;

class EnrollmentController extends BaseController
{
    public function __construct(EnrollmentService $service)
    {
        parent::__construct($service);
    }
}
