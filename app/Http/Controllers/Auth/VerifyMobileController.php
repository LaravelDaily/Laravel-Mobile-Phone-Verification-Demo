<?php

namespace App\Http\Controllers\Auth;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Exceptions\TwilioException;
use App\Providers\RouteServiceProvider;
use Twilio\Exceptions\ConfigurationException;

class VerifyMobileController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'code' => ['required', 'numeric'],
        ]);

        if ($request->code === auth()->user()->mobile_verify_code) {
            $request->user()->markMobileAsVerified();

            return redirect()->to(RouteServiceProvider::HOME)->with(['message' => __('mobile.verified')]);
        }

        if($request->user()->mobile_attempts_left <= 0) {
            $request->user()->update([
                'mobile_verify_code' => random_int(111111, 999999),
                'mobile_attempts_left' => config('mobile.max_attempts'),
            ]);
            $request->user()->sendMobileVerificationNotification();
            return back()->with(['error' => __('mobile.new_code')]);
        }
        else {
            $request->user()->decrement('mobile_attempts_left');
            return back()->with(['error' => __('mobile.error_with_attempts', ['attempts' => $request->user()->mobile_attempts_left])]);
        }

    }
}
