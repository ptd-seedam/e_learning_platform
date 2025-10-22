<?php

namespace App\Services;

use App\Repositories\Eloquent\LessonRepository;

class LessonService extends BaseService
{
    private $lessonRepository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }
}
