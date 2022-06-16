<?php

namespace App\Traits;

use App\Notifications\SendVerifySMS;

trait MustVerifyMobile
{
    public function hasVerifiedMobile(): bool
    {
        return ! is_null($this->mobile_verified_at);
    }

    public function markMobileAsVerified(): bool
    {
        return $this->forceFill([
            'mobile_verified_at' => $this->freshTimestamp(),
            'mobile_attempts_left' => 0,
        ])->save();
    }

    public function sendMobileVerificationNotification(): void
    {
        $this->notify(new SendVerifySMS);
    }
}
