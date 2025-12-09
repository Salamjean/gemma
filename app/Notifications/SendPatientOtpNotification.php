<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendPatientOtpNotification extends Notification
{
    use Queueable;

    public $otpCode;
    public $patientName;
    public $appName;

    public function __construct($otpCode, $patientName)
    {
        $this->otpCode = $otpCode;
        $this->patientName = $patientName;
        $this->appName = 'GEMMA';
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Code OTP de connexion - ' . 'GEMMA')
            ->from('contact@edemarchee-ci.com', 'GEMMA')
            ->view('emails.patient-otp', [
                'otpCode' => $this->otpCode,
                'patientName' => $this->patientName,
                'appName' => 'GEMMA',
                'expiryMinutes' => 10,
                'currentYear' => date('Y'),
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'otp_code' => $this->otpCode,
        ];
    }
}