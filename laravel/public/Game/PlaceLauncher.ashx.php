<?php
http_response_code(200);
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

$user = addcslashes($_GET["user"],'"');
$ip = addcslashes($_GET["ip"],'"');
$port = (int)$_GET["port"];
$id = (int)$_GET["id"];
$mship = addcslashes($_GET["mship"],'"');
$binary = addcslashes($_GET["binary"],'"');
// we store the userid as a cookie for marketplace stuff
setcookie('rbxuserId',$id, time() + (86400 * 30), "/", "rbolock.tk");
setcookie('rbxuserId',$id, time() + (86400 * 30), "/", ".rbolock.tk");
// store server's ip address
setcookie('RCCIPAddress',$_GET["ip"], time() + (86400 * 30), "/", "rbolock.tk");
setcookie('RCCIPAddress',$_GET["ip"], time() + (86400 * 30), "/", ".rbolock.tk");

/*
placeid=1818
ip=127.0.0.1
port=53640
user=ROBLOX
id=1
ticket=test
*/

//{"Error" : "Invalid request type"}
//{"jobId":null,"status":0,"message":"Waiting for server"}
//{"jobId":null,"status":1,"message":"Waiting for server"}
$joinScriptUrl = "http://localhost/Game/Join.ashx";
$authUrl = "http://localhost/Login/Negotiate.ashx";
$status = 2;
if(isset($_GET['user']) && isset($_GET['id'])){
	$joinScriptUrl = "http://localhost/Game/Join.ashx?placeId=" . $_GET["placeid"] . "&user=" . $_GET['user'] . "&id=" . $_GET['id'];
}else{
    $joinScriptUrl = "http://localhost/Game/Join.ashx?placeId=" . $_GET["placeid"];
}

if ($status == 0) {
    $data = [
        'jobId' => '7ee9e9af-d4c6-4e4f-91e9-454787f78330',
        'status' => $status,
        'message' => 'Waiting for server'
    ];

    echo json_encode($data);
} else if ($status == 1) {
    $data = [
        'jobId' => '7ee9e9af-d4c6-4e4f-91e9-454787f78330',
        'status' => $status,
        'message' => 'Waiting for server'
    ];

    echo json_encode($data);
} else if ($status == 2) {
    $data = array(
        'jobId' => '7ee9e9af-d4c6-4e4f-91e9-454787f78330',
        'status' => $status,
        'joinScriptUrl' => $joinScriptUrl,
        'authenticationUrl' => $authUrl,
        'authenticationTicket' => '1',
        'message' => null
    );

    //echo json_encode($data);
    echo(str_replace('\\/', '/', json_encode($data)));

    /*$joinscript = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    $joinscript = gameUtils::signv1($joinscript);
    header("Content-Type: application/json");
    exit($joinscript);
    */
}
