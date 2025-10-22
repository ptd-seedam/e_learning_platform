<?php

namespace App\Http\Controllers\API;

use App\Services\LessonService;

class LessonController extends BaseController
{
    public function __construct(LessonService $service)
    {
        parent::__construct($service);
    }
}
