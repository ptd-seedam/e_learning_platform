<?php

namespace App\Services;

use App\Repositories\Eloquent\LessonMaterialRepository;

class LessonMaterialService extends BaseService
{
    private $lessonMaterialRepository;

    public function __construct(LessonMaterialRepository $lessonMaterialRepository)
    {
        $this->lessonMaterialRepository = $lessonMaterialRepository;
    }
}
