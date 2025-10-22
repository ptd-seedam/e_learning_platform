<?php

namespace App\Http\Controllers\API;

use App\Services\LessonMaterialService;

class LessonMaterialController extends BaseController
{
    public function __construct(LessonMaterialService $service)
    {
        parent::__construct($service);
    }
}
