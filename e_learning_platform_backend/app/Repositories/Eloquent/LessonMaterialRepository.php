<?php

namespace App\Repositories\Eloquent;

use App\Models\LessonMaterial;
use App\Repositories\Contracts\LessonMaterialRepositoryInterface;

class LessonMaterialRepository extends BaseRepository implements LessonMaterialRepositoryInterface
{
    public function __construct(LessonMaterial $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
