<?php

namespace App\Http\Controllers\API;

use App\Services\LiveClassService;

class LiveClassController extends BaseController
{
    public function __construct(LiveClassService $service)
    {
        parent::__construct($service);
    }
}
