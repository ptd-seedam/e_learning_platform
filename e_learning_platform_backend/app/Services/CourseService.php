<?php

namespace App\Services;

use App\Repositories\Eloquent\CourseRepository;

class CourseService extends BaseService
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getCoursesByTeacherId($id)
    {
        $teacher = $this->courseRepository->getCoursesByTeacherId($id);
        return $teacher ?? 0;
    }

    // Thêm fun ở dưới
}
