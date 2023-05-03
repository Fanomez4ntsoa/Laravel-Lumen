<?php

namespace App\Events;

use App\Meetad\Models\Group;
use App\Meetad\Models\User;

class UserSignedUpEvent extends Event
{
    /**
     * Create a new event instance
     *
     * @param User $user
     * @param Group $group
     * @param string $token
     */
    public function __construct(public User $user, public Group $group, public string $token)
    {
        //
    }
}
