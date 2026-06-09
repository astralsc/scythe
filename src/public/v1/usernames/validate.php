<?php
http_response_code(200);
header('Content-Type: application/json');

include __DIR__ . '/../../config/db.php';
include __DIR__ . '/../../config/filterlist.php';

$input = json_decode(file_get_contents('php://input'), true);
$birthday = $_GET['birthday'];
$context = $_GET['context'];
$username = $_GET['username'];

$inappropriateList = $inappropriateNameList;

$data = [
    'code' => 0, // 0 = Valid, 1 = Taken, 2 = Inappropriate
    'message' => 'Username is valid'
];
if (!$username) {

    $data = [
        'code' => 1,
        'message' => 'Username is required'
    ];

    echo json_encode($data);
    exit;
}
$usernameLower = strtolower($username);
foreach ($inappropriateList as $badWord) {
    if (strpos($usernameLower, strtolower($badWord)) !== false) {
        $data = [
            'code' => 2,
            'message' => 'Username not appropriate for Roblox'
        ];
        echo json_encode($data);
        exit;
    }
}

$stmt = $DBReq->prepare("SELECT id FROM accounts WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $data = [
        'code' => 1,
        'message' => 'Username is already in use'
    ];

} else {

    $data = [
        'code' => 0,
        'message' => 'Username is valid'
    ];
}

$stmt->close();

echo json_encode($data);