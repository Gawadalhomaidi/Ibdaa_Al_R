<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // إنشاء كود تحقق جديد
        $verificationCode = $request->user()->generateVerificationCode();
        
        // إرسال البريد الإلكتروني مع كود التحقق
        Mail::to($request->user()->email)->send(new VerificationCodeMail($request->user(), $verificationCode));

        return back()->with('status', 'verification-link-sent');
    }
}