<?php
$urls = [
    "https://app.1smsafrica.com/api/v3/sms/send",
    "https://api.esmsafrica.io/api/sms/send"
];
$apiKey = "782|J7SALL1t43PfPOfm61ubfhOwHTYBkvpZx13oGkNOaba8cbd0";

foreach ($urls as $url) {
    echo "--- Testing URL: $url ---\n";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'recipient' => '2250798278981',
        'phoneNumber' => '2250798278981',
        'sender_id' => 'GEMMA',
        'senderId' => 'GEMMA',
        'message' => 'Test debug',
        'text' => 'Test debug',
        'type' => 'plain'
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $apiKey,
        "Content-Type: application/json",
        "Accept: application/json"
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    echo "HTTP Code: " . $info['http_code'] . "\n";
    echo "Response: $response\n\n";
}