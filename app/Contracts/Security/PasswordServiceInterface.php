<?php

namespace App\Contracts\Security;

use App\Meetad\Models\User;
interface PasswordServiceInterface
{
    // /**
    //  * Generate password reset token
    //  *
    //  * @param User $user
    //  * @return boolean
    //  */
    // public function generatePasswordResetToken(User $user): bool;
    
    /**
     * Verify token validity
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
