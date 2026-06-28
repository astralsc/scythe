<?php
http_response_code(200);
header('Content-Type: application/json');

setcookie(".ROBLOSECURITY", "", time() - 3600, "/");

$data = [];

echo json_encode($data);
