<?php
http_response_code(200);
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

$userid = rand(1, 9999);
$charapp = "http://localhost/Asset/CharacterFetch.ashx";

$data = [
  "ClientPort" => 0,
  "MachineAddress" => '127.0.0.1',
  "ServerPort" => '53640',
  "PingUrl" => "",
  "PingInterval" => 30,
  "UserName" => "Guest " . $userid,
  "SeleniumTestMode" => false,
  "UserId" => $userid,
  "SuperSafeChat" => false,
  "CharacterAppearance" => $charapp,
  "ClientTicket" => gameUtils::GenerateClientTicketv1($userid, $username, $charapp, $jobid),
  "GameId" => $jobid,
  "PlaceId" => 1818,
  "MeasurementUrl" => "",
  "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
  "BaseUrl" => "http://localhost/",
  "ChatStyle" => "ClassicAndBubble",
  "VendorId" => "0",
  "ScreenShotInfo" => "",
  "VideoInfo" => "",
  "CreatorId" => 1,
  "CreatorTypeEnum" => "User",
  "MembershipType" => 'None',
  "AccountAge" => 365,
  "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
  "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
  "CookieStoreEnabled" => true,
  "IsRobloxPlace" => false,
  "GenerateTeleportJoin" => false,
  "IsUnknownOrUnder13" => false,
  "SessionId" => "",
  "DataCenterId" => 69420,
  "UniverseId" => 1818,
  "BrowserTrackerId" => 0,
  "UsePortraitMode" => false,
  "FollowUserId" => 0
];

$joinscript = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
$joinscript = gameUtils::signv1($joinscript);
exit($joinscript);