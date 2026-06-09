<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'hasConnectedXboxAccount' => 'false',
    'gamertag' => 'david'
];

echo json_encode($data);