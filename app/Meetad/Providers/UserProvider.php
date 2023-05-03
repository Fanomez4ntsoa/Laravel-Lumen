<?php

namespace App\Meetad\Providers;

use App\Meetad\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Admin\UserServiceInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider as LaravelUserProvider;

class UserProvider implements LaravelUserProvider
{
    public function __construct(protected UserServiceInterface $userService)
    {
        //
    }

    /**
     * Retrieve user by identifier
     *
     * @param mixed $identifier
     * @return Authenticatable|null
     */
    public function retrieveById(mixed $identifier): ?Authenticatable
    {
        return $this->userService->find($identifier);
    }

    /**
     * Retrieve user by token
     *
     * @param mixed $identifier
     * @param mixed $token
     * @return Authenticatable|null
     */
    public function retrieveByToken(mixed $identifier, mixed $token): ?Authenticatable
    {
        return null;
    }

    /**
     * Update remember me token
     *
     * @param Authenticatable $user
     * @param [type] $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Do nothing, remember me feature is disabled
    }

    /**
     * Retrive user by credentials
     *
     * @param array $credentials ['email' => $email, 'password' => $password]
     * @return Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        if (isset($credentials['email']) && isset($credentials['password'])) {
            $user = $this->userService->findByLogin($credentials['email']);
            if (isset($user) && $user instanceof User) {
                return Hash::check($credentials['password'], $user->getHashedPassword())
                    ? $user
                    : null;
            }
        }

        return null;
    }

    /**
     * Validate user's credentials
     *
     * @param Authenticatable $user
     * @param array $credentials
     * @return boolean
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $asseretUser = $this->retrieveByCredentials($credentials);

        return $user->id == $asseretUser->id;
    }
}
