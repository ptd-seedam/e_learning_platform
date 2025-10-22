<?php

namespace App\Services;

use App\Repositories\Eloquent\QuizRepository;

class QuizService extends BaseService
{
    private $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }
}
