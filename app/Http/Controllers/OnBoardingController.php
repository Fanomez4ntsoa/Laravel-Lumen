<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Meetad\AccountServiceInterface;
use App\Contracts\User\OnBoardingServiceInterface;

class OnboardingController extends Controller
{
    public function __construct(
        protected OnBoardingServiceInterface $onBoardingService,
        protected AccountServiceInterface $accountService,
    ) {
    }

    /**
     * Check Account Meetad 
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function checkAccount (Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'Login' => 'required'
        ]);

        if($validator->fails()) {
            return $this->error(
                message:__('error.validation'),
                data: $validator->errors(),
                httpCode: 400
            );
        }
    }
}