<?php

namespace App\Meetad\Models;

use DateTimeInterface;
use App\MVola\Models\User;

class UserGroup
{
    /**
     * User group id
     *
     * @var integer
     */
    public int $id;

    /**
     * Related group
     *
     * @var Group|null
     */
    public ?Group $group;

    /**
     * Related user
     *
     * @var User|null
     */
    public ?User $user;

    /**
     * Admin granted status
     *
     * @var boolean
     */
    public bool $isAdmin;

    /**
     * Expiration status
     *
     * @var boolean
     */
    public bool $expired;

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
