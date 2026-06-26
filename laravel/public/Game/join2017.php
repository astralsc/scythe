<?php

header("content-type:text/plain");

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
//$head = addcslashes($_GET["head"],'"');
//$torso = addcslashes($_GET["torso"],'"');
//$leftarm = addcslashes($_GET["leftarm"],'"');
//$rightarm = addcslashes($_GET["rightarm"],'"');
//$leftleg = addcslashes($_GET["leftleg"],'"');
//$rightleg = addcslashes($_GET["rightleg"],'"');

ob_start();
?>

{"ClientPort":0,"MachineAddress":"<?php echo $ip; ?>","ServerPort":"<?php echo $port; ?>","PingUrl":"","PingInterval":20,"UserName":"<?php echo $user; ?>","SeleniumTestMode":true,"UserId":<?php echo $id; ?>,"SuperSafeChat":false,"CharacterAppearance":"http://www.rbolock.tk/v1.1/avatar-fetch/?placeId=<?php echo $binary; ?>&userId=<?php echo(rand(1,999999999)); ?>","ClientTicket":"","GameId":3,"PlaceId":1818,"MeasurementUrl":"","WaitingForCharacterGuid":"26eb3e21-aa80-475b-a777-b43c3ea5f7d2","BaseUrl":"http://www.rbolock.tk","ChatStyle":"ClassicAndBubble","GameChatType":"AllUsers","VendorId":0,"ScreenShotInfo":"","VideoInfo":"","CreatorId":1,"CreatorTypeEnum":"User","MembershipType":"<?php echo $mship; ?>","AccountAge":3000000,"CookieStoreFirstTimePlayKey":"rbx_evt_ftp","CookieStoreFiveMinutePlayKey":"rbx_evt_fmp","CookieStoreEnabled":true,"IsRobloxPlace":true,"GenerateTeleportJoin":false,"IsUnknownOrUnder13":false,"SessionId":"39412c34-2f9b-436f-b19d-b8db90c2e186|00000000-0000-0000-0000-000000000000|0|190.23.103.228|8|2021-03-03T17:04:47+01:00|0|null|null","DataCenterId":0,"UniverseId":3,"BrowserTrackerId":0,"UsePortraitMode":false,"FollowUserId":0,"characterAppearanceId":<?php echo $id; ?>}

<?php
$data = ob_get_clean();
$signature;
$key = file_get_contents("./PrivateKey.pem");
openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
echo "--rbxsig" . sprintf("%%%s%%%s", base64_encode($signature), $data);

?>
