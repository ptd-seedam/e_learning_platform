<?php

namespace App\Services;

use App\Repositories\Eloquent\AnswerOptionRepository;
use App\Services\BaseService;

class AnswerService extends BaseService
{
    private $answerOption;
    private function __construct(AnswerOptionRepository $answerOption)
    {
        $this->answerOption = $answerOption;
    }

    public function getQuestionByQuestionId($id)
    {
        $result = $this->answerOption->getQuestionByQuestionId($id);
        return $result ?? 0;
    }
}
