<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'success' => 'true',
    'message' => ''
];

echo json_encode($data);