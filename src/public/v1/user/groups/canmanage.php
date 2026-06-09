<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Success' => 'true',
    'CanManage' => 'true'
];

echo json_encode($data);