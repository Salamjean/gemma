<?php

namespace App\Console\Commands;

use App\Models\OneSignalToken;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\RendezVous;
use App\Services\OneSignalNotificationSender;

class RappelRDVNotifications extends Command
{
    protected $signature = 'notifications:send-upcoming-appointments';
    protected $description = 'Votre prochain RDV est prevu pour le ';

    public function handle()
    {

        $twoDays = Carbon::now()->addDays(2);

        $upcomingAppointments = RendezVous::where('date', $twoDays->format('d/m/Y'))->get();

        foreach ($upcomingAppointments as $rdv) {

            $patientId = OneSignalToken::where('patient_id', $rdv->consultation->patient_id)->pluck('token')->toArray();

            if (count($patientId) > 0) {
                $notificationSender = new OneSignalNotificationSender($patientId, "$this->description $rdv->date_prochain_rdv!");
                $notificationSender->sendNotification();
            }
        }
    }


}
