<?php 

namespace App\Contracts\User;

interface OnBoardingServiceInterface
{
    /**
     * Save new user and group
     *
     * @param string $email
     * @param string $group
     * @param string $name
     * @param string|null $firstname
     * @return integer
     */
    public function save(string $email, string $group, string $name, string $firstname = null): int;
}