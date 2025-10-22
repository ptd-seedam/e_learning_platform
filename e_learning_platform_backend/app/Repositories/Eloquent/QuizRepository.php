<?php

namespace App\Repositories\Eloquent;

use App\Models\Quiz;
use App\Repositories\Contracts\QuizRepositoryInterface;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
    public function __construct(Quiz $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
