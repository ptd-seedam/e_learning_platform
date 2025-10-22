<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
