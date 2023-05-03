<?php

namespace App\Meetad\Libraries;

use Illuminate\Support\Facades\Validator;

class ExtendRequestValidator extends Validator {

    /**
     *
     * @param string $attribute
     * @param mixed $value
     * @param mixed $parameters
     * @return boolean|null
     */
    public function validateActivation (string $attribute, mixed $value, mixed $parameters ) : bool|null 
    {
        return in_array($value, [STATUS_ENABLED, STATUS_DISABLED]);
    }

    public function validateStatus (string $attribute, mixed $value, mixed $parameters ) : bool|null
    {
        return in_array($value, [STATUS_ENABLED, STATUS_DISABLED, STATUS_SUSPENDED]);
    }
}