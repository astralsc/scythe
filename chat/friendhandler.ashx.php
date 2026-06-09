<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Error' => 'User is not logged in.'
];

echo json_encode($data);