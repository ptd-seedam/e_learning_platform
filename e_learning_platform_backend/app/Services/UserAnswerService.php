<?php

namespace App\Services;

use App\Repositories\Eloquent\UserAnswerRepository;

class UserAnswerService extends BaseService
{
    private $userAnswerRepository;

    public function __construct(UserAnswerRepository $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }
}
