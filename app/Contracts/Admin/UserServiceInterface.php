<?php
namespace App\Contracts\Admin;

use App\Models\User;

interface UserServiceInterface
{
    public function find(int $id): ?User;

    public function findByLogin(string $login): ?User;
}