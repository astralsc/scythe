<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'data' => [
        '0.271.1pcplayer',
        '0.360.0pcplayer',
        '0.205.0pcplayer',
        '0.450.0pcplayer',
        '0.463.0pcplayer',
        '0.465.0pcplayer',
        '0.450.0macplayer',
        '0.463.0macplayer',
        '0.465.0macplayer',
        '0.360.0rccservice',
        '2.466.0androidapp',
        '2.463.0androidapp',
        '2.450.0androidapp',
        '2.360.0androidapp',
        '2.271.0androidapp',
        'INTERNALandroidapp',
        'INTERNALiosapp',
        '2.360.0iosapp',
        '2.450.0iosapp',
        '2.463.0iosapp',
        'e6b5a4e75b0cc2ecc071f93253499c36'
    ]
];

echo json_encode($data);