<?php
http_response_code(200);
header('Content-Type: application/json');

include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/config.php';

$user = null;
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
        $userId = $user['id'];
        $username = $user['username'];
        $displayname = $user['displayname'];

        echo($userId);
        exit();
    } else {
        echo('0');
        exit();
    }
} else {
    echo('0');
    exit();
}
?>