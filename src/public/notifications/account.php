<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'EmailNotificationEnabled' => false,
    'PasswordNotificationEnabled' => false
];

echo json_encode($data);