<?php

namespace App\Components\Alert;

abstract class Alert
{
    /**
     * Status
     *
     * @var boolean
     */
    public bool $status;

    /**
     * Error/Success message
     *
     * @var string
     */
    public string $message;

    /**
     * HTTP Code Success/Error
     *
     * @var integer
     */
    public int $httpCode;
}