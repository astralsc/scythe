<?php
http_response_code(200);
header('Content-Type: application/json');
date_default_timezone_set('UTC');

include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/config.php';
include __DIR__ . '/../config/filterlist.php';

$isEligibleForHideAdsAbTest = isset($_POST['isEligibleForHideAdsAbTest']) ? $_POST['isEligibleForHideAdsAbTest'] : false;
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'Female';
$context = isset($_POST['context']) ? $_POST['context'] : null;

$inappropriateList = $inappropriateNameList;

// if registration is disabled
if ($registrationDisabled == true) {
    http_response_code(401);
    exit;
}

// validation
if (!$username || !$password) {
    http_response_code(401);
    exit;
}

// if the name is inappropriate
$usernameLower = strtolower($username);
foreach ($inappropriateList as $badWord) {
    if (strpos($usernameLower, strtolower($badWord)) !== false) {
        http_response_code(401);
        exit;
    }
}

// format the date and birth
$dateOfBirth = null;
if (!empty($birthday)) {
    $birthday = trim($birthday);
    $birthday = preg_replace('/\s+/', ' ', $birthday);
    $birthday = ucwords(strtolower($birthday));
    $parsedDate = DateTime::createFromFormat('d M Y', $birthday);
    if ($parsedDate) {
        $dateOfBirth = $parsedDate->format('Y-m-d');
    }
}

// if the user exists
$stmt = $DBReq->prepare("SELECT id FROM accounts WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();

// if username taken
if ($res->num_rows > 0) {
    $stmt->close();
    http_response_code(401);
    exit;
}
$stmt->close();

$hashedPassword = password_hash($password, PASSWORD_BCRYPT); // hash password

// .roblosecurity gen
$genNewToken = bin2hex(openssl_random_pseudo_bytes(500));
$genNewToken = substr($genNewToken, 0, 884);
$roblosecurity = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_'.$genNewToken;

// required fields
$robux = 0;
$tickets = 0;
$userabove13 = 0;

$description = "";
$status = "";
$groups = "";
$inventory = "";
$avatar = "";
$games = "";

// timestamp for creation date and updated date (which is when the player was online)
$createdAt = date('Y-m-d H:i:s');
$updatedAt = $createdAt;

// insert
$stmt = $DBReq->prepare("
    INSERT INTO accounts 
    (username, displayname, email, password, dateofbirth, gender, robux, tickets, roblosecurity,
     description, status, userabove13, groups, inventory, avatar, games, created_at, updated_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$email = "";

$stmt->bind_param(
    "sssssssississsssss",
    $username,
    $username,
    $email,
    $hashedPassword,
    $dateOfBirth,
    $gender,
    $robux,
    $tickets,
    $roblosecurity,
    $description,
    $status,
    $userabove13,
    $groups,
    $inventory,
    $avatar,
    $games,
    $createdAt,
    $updatedAt
);

if (!$stmt->execute()) {
    echo json_encode([
        "success" => false,
        "error" => $stmt->error
    ]);
    exit;
}

$newUserId = $DBReq->insert_id;
$stmt->close();

// .roblosecurity setter
setcookie(".ROBLOSECURITY", $roblosecurity, time() + (60 * 60 * 24 * 365), "/");

// final
$data = [
  "Status" => "OK",
  "UserInfo" => [
      "UserID" => $newUserId,
      "UserName" => $username,
      "RobuxBalance" => $user['robux'],
      "TicketsBalance" => $user['tickets'],
      "ThumbnailUrl" => "https://web.archive.org/web/20070808165254im_/http://t3.roblox.com:80/Avatar-100x100-83e75d04a99ca6e52c16a17cce5af580.Png",
      "IsAnyBuildersClubMember" => false
  ]
];

echo json_encode($data);