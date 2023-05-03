<?php

namespace App\Meetad\Models;

class Access
{
    /**
     * Access ID
     *
     * @var integer
     */
    public int $id;

    /**
     * Access key
     *
     * @var string
     */
    public string $key;

    /**
     * Access description
     *
     * @var string
     */
    public string $description;
}
