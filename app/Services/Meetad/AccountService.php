<?php

namespace App\Services\Meetad;

use App\Contracts\Meetad\AccountServiceInterface;

class AccountService implements AccountServiceInterface
{
    /**
     * Determine user profile
     *
     * @param string $accountId
     * @return string|null
     */
    public function getProfile(string $accountId): ?string
    {
        if(env('APP_ENV') === ENV_LOCAL) {
            // return PROFILE_GP;
        }
    }
}