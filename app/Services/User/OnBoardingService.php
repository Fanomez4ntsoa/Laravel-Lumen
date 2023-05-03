<?php

namespace App\Services\User;

use App\Contracts\User\OnBoardingServiceInterface;

class OnBoardingService implements OnBoardingServiceInterface
{   
    /**
     * Undocumented function
     *
     * @param string $email
     * @param string $group
     * @param string $name
     * @param string|null $firstname
     * @return integer
     */
    public function save(string $email, string $group, string $name, ?string $firstname = null): int
    {
        
    }
}