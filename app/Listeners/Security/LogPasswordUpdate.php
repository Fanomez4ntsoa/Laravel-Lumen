<?php
namespace App\Listeners\Security;

use App\Contracts\ActivityLoggerInterface;
use App\Events\Security\PasswordUpdatedEvent;

class LogPasswordUpdate
{
    public function __construct(protected ActivityLoggerInterface $logger)
    {
        //
    }

    /**
     * Handle the event
     *
     * @param PasswordUpdatedEvent $event
     * @return void
     */
    public function handle(PasswordUpdatedEvent $event)
    {
        $name = $event->user->getFullname();
        $comment = $event->initialization
            ? __('activity.security.password.init', ['name' => $name])
            : __('activity.security.password.reset', ['name' => $name]);

        $this->logger->dump(
            comment: $comment,
            userId: $event->user->id,
            type: ACTIVITY_PASSWORD_RESET,
        );
    }
}
