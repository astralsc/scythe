<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'browserTrackerId' => 1234567890,
    'appDeviceIdentifier' => 'null'
];

echo json_encode($data);