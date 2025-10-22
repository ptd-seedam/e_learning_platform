<?php

namespace App\Services;

use App\Repositories\Eloquent\TestAttemptRepository;

class TestAttemptService extends BaseService
{
    private $testAttemptRepository;

    public function __construct(TestAttemptRepository $testAttemptRepository)
    {
        $this->testAttemptRepository = $testAttemptRepository;
    }
}
