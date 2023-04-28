<?php
namespace App\Contracts\Meetad;

interface AccountServiceInterface
{
    public function isCertified(string $accountId): bool|null;

    public function getProfile(string $accountId): ?string;
    
}