<?php

namespace App\Components\Alert;


class Success extends Alert
{
    public function __construct(string $code = 'default', int $httpCode = 200 )
    {
        $this->status = true;
        $this->message = __('message.success.' . $code);
        $this->httpCode = $httpCode;
    }
}