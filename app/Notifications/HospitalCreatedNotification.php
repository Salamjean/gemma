<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HospitalCreatedNotification extends Notification 
{
    use Queueable;

    public $hospital;
    public $user;
    public $password;

    public function __construct($hospital, $user, $password)
    {
        $this->hospital = $hospital;
        $this->user = $user;
        $this->password = $password;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Confirmation de création de compte hôpital')
            ->from('contact@edemarchee-ci.com', 'GEMMA')
            ->view('emails.hospital-created', [
                'hospital' => $this->hospital,
                'user' => $this->user,
                'password' => $this->password,
                'currentYear' => date('Y'),
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'hospital_id' => $this->hospital->id,
            'reference' => $this->hospital->reference,
        ];
    }
}