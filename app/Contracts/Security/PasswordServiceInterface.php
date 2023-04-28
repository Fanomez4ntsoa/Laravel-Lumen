<?php

namespace App\Contracts\Security;

interface PasswordServiceInterface
{
    /**
     * Verify validation token
     *
     * @param string $login
     * @param string $token
     * @return boolean
     */
    public function verifyToken(string $login, string $token): bool;

    /**
     * Update password
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function updatePassword(string $login, string $password): bool;
}