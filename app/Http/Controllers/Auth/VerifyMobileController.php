<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
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

        // If the seconds_of_validation feature is enabled 
        if (config('mobile.seconds_of_validation') > 0) {
            $lastSend = Carbon::parse($request->user()->mobile_verify_code_sent_at);
            if ($lastSend->diffInMinutes(Carbon::now()) > config('mobile.seconds_of_validation')) {
                $request->user()->sendMobileVerificationNotification(true);
                return back()->with(['error' => __('mobile.expired')]);
            }
        }

        // Code correct
        if ($request->code === auth()->user()->mobile_verify_code) {
            $request->user()->markMobileAsVerified();
            return redirect()->to(RouteServiceProvider::HOME)->with(['message' => __('mobile.verified')]);
        }

        // Max attempts feature
        if (config('mobile.max_attempts') > 0) {

            $request->user()->decrement('mobile_attempts_left');
            if ($request->user()->mobile_attempts_left <= 0) {

                // If the seconds_of_validation feature is enabled 
                if (config('mobile.seconds_of_validation') > 0) {
                    $lastSend = Carbon::parse($request->user()->mobile_verify_code_sent_at);
                    $minutesToWait = config('mobile.seconds_of_validation') - $lastSend->diffInMinutes(Carbon::now());
                    return back()->with(['error' => __('mobile.error_wait', ['minutes' => $minutesToWait])]);
                }
                
                $request->user()->sendMobileVerificationNotification(true);
                return back()->with(['error' => __('mobile.new_code')]);
            }

            return back()->with(['error' => __('mobile.error_with_attempts', ['attempts' => $request->user()->mobile_attempts_left])]);
        }

        return back()->with(['error' => __('mobile.error_code')]);

    }
}
