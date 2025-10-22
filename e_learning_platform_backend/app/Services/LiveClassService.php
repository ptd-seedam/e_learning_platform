<?php

namespace App\Services;

use App\Repositories\Eloquent\LiveClassRepository;

class LiveClassService extends BaseService
{
    private $liveClassRepository;

    public function __construct(LiveClassRepository $liveClassRepository)
    {
        $this->liveClassRepository = $liveClassRepository;
    }
}
