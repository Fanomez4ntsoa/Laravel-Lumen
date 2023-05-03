<?php
namespace App\Contracts\Meetad;

interface AccountServiceInterface
{
    /**
     * Determine user profile
     *
     * @param string $msisdn
     * @return string|null
     */
    public function getProfile(string $accountId): ?string;
    
}