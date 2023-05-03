<?php

namespace App\Events\Security;

use App\Events\Event;
use App\Meetad\Models\User;
use DateTimeInterface;

class PasswordResetEvent extends Event
{
    /**
     * Create a new event instance
     *
     * @param User $user
     * @param string $token
     * @param DateTimeInterface $expirationDate
     */
    public function __construct(public User $user, public string $token, public DateTimeInterface $expirationDate)
    {
        //
    }
}
