<?php

namespace App\Listeners;

use Twilio\Rest\Client;
use App\Interfaces\MustVerifyMobile;
use Illuminate\Auth\Events\Registered;
use Twilio\Exceptions\TwilioException;
use Twilio\Exceptions\ConfigurationException;

class SendMobileVerificationNotification
{
    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyMobile && ! $event->user->hasVerifiedMobile()) {
            $event->user->sendMobileVerificationNotification(true);
        }
    }
}
