<?php
http_response_code(200);
header('Content-Type: application/json');

include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/config.php';

$input = json_decode(file_get_contents('php://input'), true);
$ctype = $input['ctype'] ?? null;
$cvalue = $input['cvalue'] ?: ($_POST['username'] ?? null);
$password = $input['password'] ?: ($_POST['password'] ?? null);

// if login is disabled
if ($loginDisabled == true) {
    http_response_code(401);
    exit;
}

if (!$cvalue || !$password) {
  http_response_code(401);
  echo json_encode([
    "Status" => "Error",
    "Message" => "Username and password are required."
  ]);
  exit;
}

// login check
$stmt = $DBReq->prepare("SELECT id, username, displayname, password, isbanned, robux, tickets FROM accounts WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $cvalue);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
  http_response_code(401);
  exit;
}

if (!password_verify($password, $user['password'])) {
  http_response_code(401);
  echo json_encode([
    "Status" => "Error",
    "Message" => "Invalid password."
  ]);
  exit;
}

/*// .roblosecurity gen
$genNewToken = bin2hex(openssl_random_pseudo_bytes(500));
$genNewToken = substr($genNewToken, 0, 884);
$roblosecurity = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_'.$genNewToken;

// save token
$stmt = $DBReq->prepare("UPDATE accounts SET roblosecurity = ? WHERE id = ?");
$stmt->bind_param("si", $roblosecurity, $user['id']);
$stmt->execute();
$stmt->close();

// set .robloxsecurity cookie
setcookie(".ROBLOSECURITY", $roblosecurity, time() + (60 * 60 * 24 * 365), "/");*/
$stmt = $DBReq->prepare("
    SELECT
        id,
        username,
        displayname,
        password,
        isbanned,
        robux,
        tickets,
        roblosecurity
    FROM accounts
    WHERE username = ?
    LIMIT 1
");

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
setcookie(".ROBLOSECURITY", $user['roblosecurity'], time() + (60 * 60 * 24 * 365), "/");

// final
$data = [
  "Status" => "OK",
  "UserInfo" => [
      "UserID" => $user['id'],
      "UserName" => $user['username'],
      "RobuxBalance" => $user['robux'],
      "TicketsBalance" => $user['tickets'],
      "ThumbnailUrl" => "https://web.archive.org/web/20070808165254im_/http://t3.roblox.com:80/Avatar-100x100-83e75d04a99ca6e52c16a17cce5af580.Png",
      "IsAnyBuildersClubMember" => false
  ]
];

echo json_encode($data);