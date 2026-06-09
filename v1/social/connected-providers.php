<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'providers' => []
];

echo json_encode($data);