<?php
include __DIR__ . '/../../config/db.php';
include __DIR__ . '/../../config/config.php';

$user = null;
$loggedIn = false;
$userId = -1;
$username = 'unknown';
$displayname = 'unknown';

if (isset($_COOKIE['_ROBLOSECURITY'])) {
    $token = $_COOKIE['_ROBLOSECURITY'];

    $stmt = $DBReq->prepare("
        SELECT id, username, displayname, roblosecurity
        FROM accounts
        WHERE roblosecurity = ?
    ");

    $stmt->bind_param("s", $token);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        $loggedIn = true;
        $userId = $user['id'];
        $username = $user['username'];
        $displayname = $user['displayname'];
    } else {
    }
} else {
}

http_response_code(200);
header('Content-Type: application/json');

$data = [
    'UserEmail' => 'david.baszucki@roblox.com',
    'Name' => $username,
    'UserId' => 1,
    'IsEmailVerified' => true,
    'AgeBracket' => 0,
    'UserAbove13' => true
];

echo json_encode($data);