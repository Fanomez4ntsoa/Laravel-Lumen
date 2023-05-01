<?php

namespace App\Exceptions\Validators;

use Exception;

class InvalidParameterNumberValidator extends Exception
{
    public function __construct()
    {
        parent::__construct(__('validator.number.parameter.invalid'));
    }
}