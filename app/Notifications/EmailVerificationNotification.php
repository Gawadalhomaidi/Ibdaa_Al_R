<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;

class EmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $appName = "Ibdaa Al-Riyadah";
        
        return (new MailMessage)
            ->subject("{$appName} - كود التحقق من البريد الإلكتروني")
            ->view('emails.email-verification', [
                'verificationCode' => $this->verificationCode,
                'user' => $notifiable,
                'appName' => $appName
            ]);
    }

    public function toArray($notifiable)
    {
        return [
            'verification_code' => $this->verificationCode
        ];
    }
}