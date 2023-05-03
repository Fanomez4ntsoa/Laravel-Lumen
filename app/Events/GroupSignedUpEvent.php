<?php

namespace App\Events;

use App\Meetad\Models\Group;
use App\Meetad\Models\User;

class GroupSignedUpEvent extends Event
{
    /**
     * Create a new event instance
     *
     * @param User $user
     * @param Group $group
     */
    public function __construct(public User $user, public Group $group)
    {
        //
    }
}
