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

            return redirect()->to(RouteServiceProvider::HOME)->with(['message' => 'Phone number verified']);
        }

        return back()->with(['error' => 'Invalid verification code entered!']);
    }
}
