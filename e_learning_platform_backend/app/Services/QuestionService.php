<?php

namespace App\Services;

use App\Repositories\Eloquent\QuestionRepository;

class QuestionService extends BaseService
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
}
