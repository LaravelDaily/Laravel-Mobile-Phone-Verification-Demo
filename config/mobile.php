<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mobile code max attempts
    |--------------------------------------------------------------------------
    |
    | Max attempts to input mobile verification code before re-send a new one
    |
    */

    'max_attempts' => env('MOBILE_MAX_ATTEMPTS', 3),

];
