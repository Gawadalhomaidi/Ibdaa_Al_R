<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\EmailVerificationNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VerificationController extends Controller
{
    /**
     * عرض صفحة إدخال كود التحقق
     */
    public function showVerificationForm(): View
    {
        return view('auth.verify-code');
    }

    /**
     * معالجة كود التحقق
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'verification_code' => 'required|string|size:6'
        ]);

        $user = $request->user();

        if ($user->verifyCode($request->verification_code)) {
            return redirect()->intended(RouteServiceProvider::HOME)
                ->with('success', 'تم تفعيل حسابك بنجاح!');
        }

        return back()->withErrors([
            'verification_code' => 'كود التحقق غير صحيح أو منتهي الصلاحية.'
        ]);
    }

    /**
     * إعادة إرسال كود التحقق
     */
    public function resend(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $verificationCode = $user->generateVerificationCode();
        $user->notify(new EmailVerificationNotification($verificationCode));

        return back()->with('success', 'تم إرسال كود تحقق جديد إلى بريدك الإلكتروني.');
    }
}