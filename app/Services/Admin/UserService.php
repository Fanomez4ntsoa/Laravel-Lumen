<?php

namespace App\Services\Admin;

use App\Contracts\Admin\UserServiceInterface;
use App\Meetad\Models\User;

class UserService implements UserServiceInterface
{
    /**
     * Find User By Id
     *
     * @param integer $id
     * @return User|null
     */
    public function find(int $id): ?User
    {
        
    }
    
    /**
     * Find User by Login
     *
     * @param string $login
     * @return User|null
     */
    public function findByLogin(string $login): ?User
    {
        
    }
}
