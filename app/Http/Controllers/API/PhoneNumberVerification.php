<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client as RestClient;
use Twilio\Rest\Verify\V2\Service\VerificationContext;

class PhoneNumberVerification extends Controller
{
    public $success = 200;

    protected function sendCode(Request $request)
    {
        $data = $request->all();

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new RestClient($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications->create($data['phone_number'], "sms");

        return response()->json([
            'phone_number' => $data['phone_number'], 200
        ]);
    }

    protected function verify(Request $request)
    {
        $data = $request->all();

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new RestClient($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
        if ($verification->valid) {
            return response()->json([
                'isVerified' => true,
                'phone_number' => $data['phone_number'], 200
            ]);
        }
        return response()->json([
            'error' => 'Invalid verification code entered!', 401
        ]);
    }
}
