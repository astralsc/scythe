<?php
http_response_code(200);
header('Content-Type: application/json');

$username = $_POST['username'] ?? null;

$data = [
    'success' => true
];

echo json_encode($data);