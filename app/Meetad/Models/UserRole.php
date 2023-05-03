<?php

namespace App\Meetad\Models;

use DateTimeInterface;
use App\MVola\Models\User;

class UserRole
{
    /**
     * User role id
     *
     * @var integer
     */
    public int $id;

    /**
     * Related role
     *
     * @var User
     */
    public User $user;

    /**
     * Related access
     *
     * @var Access
     */
    public Access $access;

    /**
     * Related group
     *
     * @var Group
     */
    public Group $group;

    /**
     * Expiration date minimal limit
     *
     * @var DateTimeInterface
     */
    public DateTimeInterface $validFrom;

    /**
     * Expiration date maximal limit
     *
     * @var DateTimeInterface|null
     */
    public DateTimeInterface|null $validTill;
}
