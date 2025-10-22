<?php

namespace App\Repositories\Eloquent;

use App\Models\TestAttempt;
use App\Repositories\Contracts\TestAttemptRepositoryInterface;

class TestAttemptRepository extends BaseRepository implements TestAttemptRepositoryInterface
{
    public function __construct(TestAttempt $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
