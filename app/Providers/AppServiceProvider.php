<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Admin\GroupServiceInterface::class, \App\Services\Models\GroupService::class);
        $this->app->bind(\App\Contracts\Admin\AccessServiceInterface::class, \App\Services\Models\AccessService::class);
        $this->app->bind(\App\Contracts\Admin\UserServiceInterface::class, \App\Services\Admin\UserService::class);
        $this->app->bind(\App\Contracts\Meetad\AccountServiceInterface::class, \App\Services\Mvola\AccountService::class);
        $this->app->bind(\App\Contracts\Security\PasswordServiceInterface::class, \App\Services\Security\PasswordService::class);
        $this->app->bind(\App\Contracts\User\OnBoardingServiceInterface::class, \App\Services\User\OnBoardingService::class);
        $this->app->bind(\App\Contracts\ActivityLoggerInterface::class, \App\Services\ActivityLoggerService::class);

    }

    /**
     * Boot the services
     *
     * @return void
     */
    public function boot(): void
    {

    }
}
