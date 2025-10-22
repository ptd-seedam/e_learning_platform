<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Repositories\Contracts\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    public function __construct(Lesson $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
