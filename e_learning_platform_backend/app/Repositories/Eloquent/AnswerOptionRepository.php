<?php

namespace App\Repositories\Eloquent;

use App\Models\AnswerOption;
use App\Repositories\Contracts\AnswerOptionRepositoryInterface;

class AnswerOptionRepository extends BaseRepository implements AnswerOptionRepositoryInterface
{
    public function __construct(AnswerOption $model)
    {
        parent::__construct($model);
    }

    public function getQuestionByQuestionId($questionId)
    {
        return $this->model->where('QuestionId', $questionId)->with('questions')->get();
    }

    // Các phương thức CRUD (getAll, find, create,...) đã được kế thừa từ BaseRepository
}
