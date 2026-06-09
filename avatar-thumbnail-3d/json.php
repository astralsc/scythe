<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Url' => 'https://web.archive.org/web/20160807101858/https://t5.rbxcdn.com/d32240edeabb4d87591d9cc9cf5dcb52',
    'Final' => true
];

echo json_encode($data);