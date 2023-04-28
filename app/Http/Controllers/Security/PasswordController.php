<?php

namespace App\Http\Controllers\Security;

use App\Contracts\Security\PasswordServiceInterface;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct(
        protected PasswordServiceInterface $passwordService
    ) {
    }

    
}