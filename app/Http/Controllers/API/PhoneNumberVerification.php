<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneNumberVerification extends Controller
{
    public $success = 200;

    public function verifyPhoneNumber(Request $request) {
        $phoneNumber = request('phoneNumber');
        
    }
}
