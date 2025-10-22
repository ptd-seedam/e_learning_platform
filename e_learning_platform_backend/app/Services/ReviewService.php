<?php

namespace App\Services;

use App\Repositories\Eloquent\ReviewRepository;

class QuizService extends BaseService
{
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }
}
