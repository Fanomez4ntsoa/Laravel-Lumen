<?php

namespace App\Events\Security;

use App\Events\Event;
use App\Meetad\Models\User;

class PasswordUpdatedEvent extends Event
{
    /**
     * Create a new event instance
     *
     * @param User $user
     * @param boolean $initialization
     */
    public function __construct(public User $user, public bool $initialization)
    {
        //
    }
}
