<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Error' => 'You are not logged in'
];

echo json_encode($data);