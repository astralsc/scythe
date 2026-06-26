<?php
http_response_code(200);
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$apiKey = $_GET['apiKey'];
$counterName = $_GET['counterName'];
$amount = $_GET['amount'];

$data = [
    'success' => true,
    'counterName' => $counterName,
    'amount' => $amount,
    'timestamp' => '2026-05-26 13:50:55',
    'postDataReceived' => false
];

echo json_encode($data);