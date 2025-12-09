<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientRegistrationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $patient;
    public $user;
    public $codePatient;
    public $password;

    public function __construct($patient, $user, $codePatient, $password)
    {
        $this->patient = $patient;
        $this->user = $user;
        $this->codePatient = $codePatient;
        $this->password = $password;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre inscription sur GEMMA - Code Patient')
            ->from('contact@edemarchee-ci.com', 'GEMMA')
            ->view('emails.patient-registration', [
                'patient' => $this->patient,
                'user' => $this->user,
                'codePatient' => $this->codePatient,
                'password' => $this->password,
                'currentYear' => date('Y'),
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'patient_id' => $this->patient->id,
            'code_patient' => $this->codePatient,
        ];
    }
}