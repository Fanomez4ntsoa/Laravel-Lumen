<?php

namespace App\Services\Admin;

use App\Contracts\Admin\UserServiceInterface;
use App\Meetad\Models\User;

class UserService implements UserServiceInterface
{
    public function find(int $id): ?User
    {
        
    }
    
    public function findByLogin(string $login): ?User
    {
        
    }
}
