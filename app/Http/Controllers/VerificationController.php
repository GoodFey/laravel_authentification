<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public static function verificationNotice()
    {
        return view('user.verify-email');
    }
    public static function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('user.profile');
    }
    public static function sendAgainVerificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
