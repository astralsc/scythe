<?php
http_response_code(200);
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

/*$userid = rand(1, 9999);
$charapp = "http://localhost/Asset/CharacterFetch.ashx";
$jobid = '7ee9e9af-d4c6-4e4f-91e9-454787f78330';

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
*/
?>
--rbxsig%FxU6ySNo4FrD+cp3XnMQqnsZ0rSL1uRtqSB+1zBkLRbRGezSN2bFi46MhlBG2TRh/7Pabnd56v2fx8wWpq96+XqiIecW5NsS8ZpGZrhxWlmcdFw4QlZ9/mPSq4nbu7eddMFMcMLJ4/zlV4dBKSHUwpJNfhUZQNZRBupWyNMz2V0=%
{"ClientPort":0,"MachineAddress":"127.0.0.1","ServerPort":53640,"DirectServerReturn":true,"PingUrl":"","PingInterval":0,"UserName":"FDZ","DisplayName":"FDZ","ProtocolVersion":36,"SeleniumTestMode":false,"UserId":3863,"RobloxLocale":"en_us","GameLocale":"en_us#RobloxTranslateAbTest2","SuperSafeChat":false,"CharacterAppearance":"http://cartii.fit/v1/avatar-fetch/?placeId=1818&userId=3863","ClientTicket":"6/9/2026 10:04:06 AM;cr/fPAatP8TmlrrJYoqZu/kDdWMPcV3hskqsk7sbMz0Hivaev4Ud3Wtu0+++6c34dbRL9WnMZbKzZQAHQ3pp+vtZdgHHaTjdvziWd0IrgkX2THGne8uQ0fhz6+O2g8vzVEIf/s+wS5Yu+HZPySh9wDgT7iV2TYZGhvPVgBSfrG0Ym68/L0POrSAyRRmTH3i5NPwyhNCB7RQftVs5fqlyQa+soDy3gF7uz73VZu7V9in0umfPkqivBTLZVR6Hxk9yyObV9fws78x1FGDzxC3CyyyLxEqqiQJIGN9zPW+x6sj9SbWmJkfd4eriDrv6T7qJmHleDfej5lgYSeggKIQprw==;v/TVMXbQN2tekFm05wnmJ3JzElWDcXdSkv6jYglxOS/dxP3XccyGGRbduzMRBWzMFbBIc2Dd+3ZQYq0unLciiO3llRJf864wGRnJvj4OUlkpLOvfWz0KbGNJwd4m8mD6mvQZWL7pgP+yhvZrJBa8RMa615tTRLL+GzYi+12Sxd77aXCzEaZ2Fym2uJPYKoqanCtl9PVMq1DYNTPWJmKbfmparXoeg6GkvLfYmoBWiHucX8Ofg2jwPNVk8v/HpRk5pyIaZ9SWTEn0eJ4oungpY6sal6nIprvh+k9ztt2LUIeeFCJB4sW6LWyDqNa/eY7ktMzWtzty9IKUu5TobNnOqQ==;4","NewClientTicket":"6/9/2026 10:04:06 AM;cr/fPAatP8TmlrrJYoqZu/kDdWMPcV3hskqsk7sbMz0Hivaev4Ud3Wtu0+++6c34dbRL9WnMZbKzZQAHQ3pp+vtZdgHHaTjdvziWd0IrgkX2THGne8uQ0fhz6+O2g8vzVEIf/s+wS5Yu+HZPySh9wDgT7iV2TYZGhvPVgBSfrG0Ym68/L0POrSAyRRmTH3i5NPwyhNCB7RQftVs5fqlyQa+soDy3gF7uz73VZu7V9in0umfPkqivBTLZVR6Hxk9yyObV9fws78x1FGDzxC3CyyyLxEqqiQJIGN9zPW+x6sj9SbWmJkfd4eriDrv6T7qJmHleDfej5lgYSeggKIQprw==;v/TVMXbQN2tekFm05wnmJ3JzElWDcXdSkv6jYglxOS/dxP3XccyGGRbduzMRBWzMFbBIc2Dd+3ZQYq0unLciiO3llRJf864wGRnJvj4OUlkpLOvfWz0KbGNJwd4m8mD6mvQZWL7pgP+yhvZrJBa8RMa615tTRLL+GzYi+12Sxd77aXCzEaZ2Fym2uJPYKoqanCtl9PVMq1DYNTPWJmKbfmparXoeg6GkvLfYmoBWiHucX8Ofg2jwPNVk8v/HpRk5pyIaZ9SWTEn0eJ4oungpY6sal6nIprvh+k9ztt2LUIeeFCJB4sW6LWyDqNa/eY7ktMzWtzty9IKUu5TobNnOqQ==;4","GameChatType":"AllUsers","GameId":"680e0c14-93ab-40e3-9111-37aee9cf4720","PlaceId":1818,"WaitingForCharacterGuid":"a3cc25b0-099b-4066-be70-e915de21e3d3","BaseUrl":"http://127.0.0.1/","ChatStyle":"ClassicAndBubble","VendorId":"0","ScreenShotInfo":"","VideoInfo":"<?xml version=\"1.0\"?><entry xmlns=\"http://www.w3.org/2005/Atom\" xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:yt=\"http://gdata.youtube.com/schemas/2007\"><media:group><media:title type=\"plain\"><![CDATA[ROBLOX Place]]></media:title><media:description type=\"plain\"><![CDATA[ For more games visit http://www.roblox.com]]></media:description><media:category scheme=\"http://gdata.youtube.com/schemas/2007/categories.cat\">Games</media:category><media:keywords>ROBLOX, video, free game, online virtual world</media:keywords></media:group></entry>","CreatorId":53,"CreatorTypeEnum":"User","MembershipType":"OutrageousBuildersClub","AccountAge":8,"CookieStoreFirstTimePlayKey":"rbx_evt_ftp","CookieStoreFiveMinutePlayKey":"rbx_evt_fmp","CookieStoreEnabled":true,"IsRobloxPlace":false,"IsUnknownOrUnder13":false,"SessionId":"a3cc25b0-099b-4066-be70-e915de21e3d3|680e0c14-93ab-40e3-9111-37aee9cf4720|0|127.0.0.1|8|06/09/2026 11:04:06|0|null|eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzZXNzaW9uSWQiOiI3NGFhNTE0NS01MmU1LTRhODgtOTkzZC0wNjUwODc1Y2IxMzMiLCJjcmVhdGVkQXQiOjE3ODAyODM0MzN9.F-rTJx7PTaliAbmbNvfNsHCYuwBIK6A6mnGBxidt82mFBcPFuL06eC6hG4X651UDBSm1YBtMDSPPetSUDgdt7A|null|null|null","DataCenterId":0,"UniID":175,"BrowserTrackerId":0,"UsePortraitMode":false,"FollowUserId":0,"characterAppearanceId":3863,"CountryCode":"US"}
