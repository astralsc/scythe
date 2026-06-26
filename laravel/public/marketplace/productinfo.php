<?php
header('Content-type: application/json');
$assetid = (int)$_GET['assetId'];
if(!$assetid){
	die();
}
?>
{
    "TargetId": <?php echo($assetid); ?>,
    "ProductType": "User Product",
    "AssetId": <?php echo($assetid); ?>,
    "ProductId": <?php echo($assetid); ?>,
    "Name": "scythe game test",
    "Description": "",
    "AssetTypeId": 8,
    "Creator": {
        "Id": 1,
        "Name": "ROBLOX"
    },
    "IconImageAssetId": 0,
    "Created": "2015-06-25T20:07:49.147Z",
    "Updated": "2015-07-11T20:07:51.863Z",
    "PriceInRobux": 1,
    "PriceInTickets": 1,
    "Sales": 0,
    "IsNew": true,
    "IsForSale": true,
    "IsPublicDomain": false,
    "IsLimited": false,
    "IsLimitedUnique": false,
    "Remaining": null,
    "MinimumMembershipLevel": 0,
    "ContentRatingTypeId": 0
}
