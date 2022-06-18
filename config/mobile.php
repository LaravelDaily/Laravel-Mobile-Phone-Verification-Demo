<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mobile code max attempts
    |--------------------------------------------------------------------------
    |
    | Max attempts to input mobile verification code before re-send a new one.
    | Set 0 for not use this feature.
    |
    */

    'max_attempts' => env('MOBILE_MAX_ATTEMPTS', 3)?:0,

    /*
    |--------------------------------------------------------------------------
    | Mobile seconds of validation
    |--------------------------------------------------------------------------
    |
    | Seconds of validation of the sent verification code (default 5 minutes).
    | Set 0 for not use this feature.
    |
    */

    'seconds_of_validation' => env('MOBILE_SECONDS_OF_VALIDATION', 300)?:0,

    /*
    |--------------------------------------------------------------------------
    | Mobile attempts ban seconds
    |--------------------------------------------------------------------------
    |
    | Seconds of ban when no attempts left (default 10 minutes).
    |
    */

    'attempts_ban_seconds' => env('MOBILE_ATTEMPTS_BAN_SEOCNDS', 600)?:0,

];
