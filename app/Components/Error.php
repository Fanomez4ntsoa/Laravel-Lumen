<?php

namespace App\Components\Alert;


class Error extends Alert
{
    public function __construct(string $code = 'default', int $httpCode = 500 )
    {
        $this->status = false;
        $this->message = __('message.error.' . $code);
        $this->httpCode = $httpCode;
    }
}