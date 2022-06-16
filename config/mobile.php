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

    'max_attempts' => env('MOBILE_MAX_ATTEMPTS', 3),

    /*
    |--------------------------------------------------------------------------
    | Mobile minutes of validation
    |--------------------------------------------------------------------------
    |
    | Minutes of validation of the sent verification code (default 5 minutes).
    | Set 0 for not use this feature.
    |
    */

    'minutes_of_validation' => env('MOBILE_MINUTES_OF_VALIDATION', 300),

];
