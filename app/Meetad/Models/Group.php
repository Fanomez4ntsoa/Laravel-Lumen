<?php

namespace App\Meetad\Models;

use DateTimeInterface;

class Group
{
    /**
     * Group id
     *
     * @var integer
     */
    public int $id;

    /**
     * Group name
     *
     * @var string
     */
    public string $name;

    // /**
    //  * Activation status
    //  *
    //  * @var boolean
    //  */
    // public bool $disabled;

    // /**
    //  * Expiration date minimal limit
    //  *
    //  * @var DateTimeInterface
    //  */
    // public DateTimeInterface $validFrom;

    // /**
    //  * Expiration date maximal limit
    //  *
    //  * @var DateTimeInterface|null
    //  */
    // public DateTimeInterface|null $validTill;
}
