<?php

return [
    'device' => env('FINGERPRINT_DEVICE', 'DigitalPersona U.are.U 4500'),
    'baud_rate' => env('FINGERPRINT_BAUD_RATE', 9600),
    'port' => env('FINGERPRINT_PORT', 'COM3'),
    'threshold' => env('FINGERPRINT_THRESHOLD', 80),
    'timeout' => env('FINGERPRINT_TIMEOUT', 30),
    'template_format' => env('FINGERPRINT_TEMPLATE_FORMAT', 'ISO19794-2'),
    
    'websocket' => [
        'enabled' => env('FINGERPRINT_WEBSOCKET', true),
        'host' => env('FINGERPRINT_WS_HOST', 'localhost'),
        'port' => env('FINGERPRINT_WS_PORT', 8080),
    ],
    
    'validation' => [
        'min_quality' => 60,
        'required_fingers' => ['left_index', 'right_index'],
    ]
];