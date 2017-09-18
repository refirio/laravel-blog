<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

/**
 * Class UserService
 */
class UserService
{
    /** @var UserRepositoryInterface */
    protected $user;

    /**
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $params
     *
     * @return \App\DataAccess\Eloquent\User
     */
    public function registerUser(array $params)
    {
        return $this->user->save($params);
    }
}
