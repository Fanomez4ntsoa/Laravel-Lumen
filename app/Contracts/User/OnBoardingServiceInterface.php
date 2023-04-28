<?php 

namespace App\Contracts\User;

interface OnBoardingServiceInterface
{
    public function save(): int;
}