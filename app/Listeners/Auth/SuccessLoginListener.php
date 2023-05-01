<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Authenticated;

class SuccessLoginListner
{
    public function __construct(
        protected UserActivityService $userActivityService,
        protected AuthService $authService
    ) {
    }

    public function handle(Authenticated $event)
    {
        $user = $event->user->id ?? null;
        if($user) {
            $this->authService->resetUserLoginAttemptCounter($user);
            $this->userActivityService->save(
                user: $user,
                comment:__('message.activity.success.auth'),
                type: ACTIVITY_AUTH_SUCCESS,
            );
        }
    }
}