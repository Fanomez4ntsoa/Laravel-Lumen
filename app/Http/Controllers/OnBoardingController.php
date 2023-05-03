<?php

namespace App\Http\Controllers;

use App\Contracts\Meetad\AccountServiceInterface;
use App\Contracts\User\OnBoardingServiceInterface;

class OnboardingController extends Controller
{
    public function __construct(
        protected OnBoardingServiceInterface $onBoardingService,
        protected AccountServiceInterface $accountService,
    ) {
    }
}