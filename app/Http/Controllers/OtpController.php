<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
{
    $otp = rand(100000, 999999);

    session([
        'otp_code' => $otp,
        'otp_expires_at' => now()->addSeconds(60)
    ]);

    Mail::to($request->email)->send(new OtpMail($otp));

    return redirect()->route('otp.verify.page');
}

public function sendOtp(Request $request)
{
    $otp = rand(100000, 999999);

    session([
        'otp_code' => $otp,
        'otp_expires_at' => now()->addSeconds(60)
    ]);

    Mail::to($request->email)->send(new OtpMail($otp));

    return redirect()->route('otp.verify.page');
}

}
