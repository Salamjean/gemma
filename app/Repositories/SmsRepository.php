<?php

namespace App\Repositories;


class SmsRepository
{
    private $apiKey;
    private $senderId;
    private $baseUrl;

    protected $message;
    protected $phone;

    public function __construct($phone, $message)
    {
        $this->phone = $phone;
        $this->message = $message;

        // Récupération des identifiants Yéllika depuis le .env
        $this->apiKey = env('YELLIKA_API_KEY');
        $this->senderId = env('YELLIKA_SENDER_ID', 'GEMMA');
        // Correction de l'URL basée sur le retour d'erreur
        $this->baseUrl = env('YELLIKA_API_URL', 'https://app.1smsafrica.com/api/v3/sms/send');
    }

    public function send()
    {
        // Nettoyer le numéro (garder chiffres)
        $cleanPhone = preg_replace('/[^0-9]/', '', $this->phone);

        // Formatage pour 1smsafrica (souvent 225xxxxxxxxx)
        if (!str_starts_with($cleanPhone, '225')) {
            if (str_starts_with($cleanPhone, '00225')) {
                $cleanPhone = substr($cleanPhone, 2);
            } else {
                $cleanPhone = '225' . $cleanPhone;
            }
        }

        // Endpoint V3 standard pour l'envoi de SMS
        $url = "https://app.1smsafrica.com/api/v3/sms/send";

        // Paramètres pour l'API V3 (POST JSON)
        $data = [
            'recipient' => $cleanPhone,
            'sender_id' => $this->senderId, // Doit correspondre à un Sender ID validé
            'message' => $this->message,
            'type' => 'plain' // Parfois 'text' ou 'plain'
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Important: Authentification Bearer Token
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $this->apiKey,
            "Content-Type: application/json",
            "Accept: application/json",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36"
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($error) {
            \Illuminate\Support\Facades\Log::error("1smsafrica Curl Error: $error");
            return ['success' => false, 'error' => $error];
        } else {
            \Illuminate\Support\Facades\Log::info("1smsafrica Response ($httpCode): $response");
            return ['success' => true, 'response' => $response];
        }
    }
}
