<?php
http_response_code(200);
header('Content-Type: application/json');

$data = (object)[];

echo json_encode($data);