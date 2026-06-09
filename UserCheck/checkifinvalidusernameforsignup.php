<?php
http_response_code(200);
header('Content-Type: application/json');

include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/filterlist.php';

$input = json_decode(file_get_contents('php://input'), true);
$username = $_GET['username'];

$inappropriateList = $inappropriateNameList;

if (!$username) {
    die('{"data":1}'); // 0 = Available, 1 = Taken, 2 = Inappropriate
    exit;
}
$usernameLower = strtolower($username);
foreach ($inappropriateList as $badWord) {
    if (strpos($usernameLower, strtolower($badWord)) !== false) {
        die('{"data":2}'); // 0 = Available, 1 = Taken, 2 = Inappropriate
        exit;
    }
}

$stmt = $DBReq->prepare("SELECT id FROM accounts WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die('{"data":1}'); // 0 = Available, 1 = Taken, 2 = Inappropriate
}

$stmt->close();

die('{"data":0}'); // 0 = Available, 1 = Taken, 2 = Inappropriate