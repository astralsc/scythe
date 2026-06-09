<?php
http_response_code(200);
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

/*
placeid=1818
ip=127.0.0.1
port=53640
user=ROBLOX
id=1
ticket=test
*/

//{"Error" : "Invalid request type"}
$joinScriptUrl = "http://localhost/Game/Join.ashx";
$authUrl = "http://localhost/Login/Negotiate.ashx";
$status = 2;
if(isset($_GET['user']) && isset($_GET['id'])){
	$joinScriptUrl = "http://localhost/Game/Join.ashx?placeId=" . $_GET["placeid"] . "&user=" . $_GET['user'] . "&id=" . $_GET['id'];
}else{
    $joinScriptUrl = "http://localhost/Game/Join.ashx?placeId=" . $_GET["placeid"];
}

$data = array(
    'jobId' => '789a0027-7906-4aae-bc73-a0b5075820fd',
    'status' => $status,
    'joinScriptUrl' => $joinScriptUrl,
    'authenticationUrl' => $authUrl,
    'authenticationTicket' => '1',
    'message' => null
);

//echo json_encode($data);
echo(str_replace('\\/', '/', json_encode($data)));

$joinscript = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
$joinscript = gameUtils::signv1($joinscript);
header("Content-Type: application/json");
exit($joinscript);