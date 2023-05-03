<?php

namespace App\Services\Security;

use App\Contracts\Admin\UserServiceInterface;
use App\Contracts\Security\PasswordServiceInterface;
use App\Events\Security\PasswordUpdatedEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasswordService implements PasswordServiceInterface
{
    public function __construct(
      protected UserServiceInterface $userService  
    ) {
    }

    /**
     * Verify validity of the token
     *
     * @param string $login
     * @param string $token
     * @return boolean
     */
    public function verifyToken(string $login, string $token): bool
    {
        $user = $this->userService->findByLogin($login);
        if($user) {
            $hashedToken = $user->getPasswordToken();
            if(Hash::make($token) === $hashedToken) {
                return !is_expired($user->tokenValidFrom, $user->tokenValidTill);
            }
        }

        return false;
    }

    /**
     * Update Password
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function updatePassword(string $login, string $password): bool
    {
        $user = $this->userService->findByLogin($login);
        if($user) {
            $initialization = ($user->getHashedPassword() === '');
            DB::beginTransaction();
            try {
                DB::table('users')
                    ->where(`User_Id`, $user->id)
                    ->update([
                        'password'              => Hash::make($password),
                        'Token'                 => null,
                        'Token_Valid_From'      => null,
                        'Token_Valid_Till'      => null,
                    ]);
                event(new PasswordUpdatedEvent($user, $initialization));
                DB::commit();
                
                return true;
            } catch (\Throwable $exeption) {
                Log::error($exeption->getMessage(), $exeption->getTrace());
                DB::rollBack();
            }
        }

        return false;
    }
}