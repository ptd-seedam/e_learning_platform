<?php

namespace App\Repositories\Eloquent;

use App\Models\UserAnswer;
use App\Repositories\Contracts\UserAnswerRepositoryInterface;

class UserAnswerRepository extends BaseRepository implements UserAnswerRepositoryInterface
{
    public function __construct(UserAnswer $model)
    {
        parent::__construct($model);
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
