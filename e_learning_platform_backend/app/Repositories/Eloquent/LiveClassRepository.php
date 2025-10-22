<?php

namespace App\Repositories\Eloquent;

use App\Models\LiveClass;
use App\Repositories\Contracts\LiveClassRepositoryInterface;

class LiveClassRepository extends BaseRepository implements LiveClassRepositoryInterface
{
    public function __construct(LiveClass $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
