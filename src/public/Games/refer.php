<?php
$PlaceId = $_GET['PlaceId']; // 41324860
$Position = $_GET['Position']; // 1
$PageType = $_GET['PageType']; // Profile

$url = '/games/'.$PlaceId;
header('Location: '.$url);
exit();
?>