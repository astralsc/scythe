<?php
http_response_code(200);
header('Content-Type: application/json');

$email = $_POST['email'] ?? null;

$data = [
    'success' => true
];

echo json_encode($data);