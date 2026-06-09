<?php
include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/config.php';

$user = null;
$loggedIn = false;
$userId = -1;
$username = 'unknown';
$displayname = 'unknown';

if (isset($_COOKIE['_ROBLOSECURITY'])) {
    $token = $_COOKIE['_ROBLOSECURITY'];

    $stmt = $DBReq->prepare("
        SELECT id, username, displayname, roblosecurity
        FROM accounts
        WHERE roblosecurity = ?
    ");

    $stmt->bind_param("s", $token);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        $loggedIn = true;
        $userId = $user['id'];
        $username = $user['username'];
        $displayname = $user['displayname'];
    } else {
    }
} else {
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    
<link rel="stylesheet" href="/static.rbxcdn.com/css/page___8a730e47589c1982bfc3765f8bfb8669_m.css/fetch"/>


    <script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>

    <script type="text/javascript" src="/js.rbxcdn.com/fba2c0b7a51c6ae24d4a57ff1f86895a.js.gzip"></script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://localhost/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.roblox.com/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://localhost/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://localhost/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.roblox.com/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://localhost/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.roblox.com/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.roblox.com/game/getauthticket';
Roblox.Endpoints.Urls['/game/get-hash'] = 'https://assetgame.roblox.com/game/get-hash';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.roblox.com/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.roblox.com/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.roblox.com/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.roblox.com/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.roblox.com/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://localhost/login/default.aspx';
Roblox.Endpoints.Urls['/my/avatar'] = 'https://localhost/my/avatar';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://localhost/my/money.aspx';
Roblox.Endpoints.Urls['/navigation/userdata'] = 'https://localhost/navigation/userdata';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://localhost/chat/chat';
Roblox.Endpoints.Urls['/chat/data'] = 'https://localhost/chat/data';
Roblox.Endpoints.Urls['/presence/users'] = 'https://localhost/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://localhost/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://localhost/friends/list';
Roblox.Endpoints.Urls['/navigation/getcount'] = 'https://localhost/navigation/getCount';
Roblox.Endpoints.Urls['/regex/email'] = 'https://localhost/regex/email';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://localhost/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.roblox.com/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.roblox.com/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.roblox.com/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.roblox.com/catalog/lists.aspx';
Roblox.Endpoints.Urls['/catalog/items'] = 'https://search.roblox.com/catalog/items';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.roblox.com/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.roblox.com/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.roblox.com/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.roblox.com/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.roblox.com/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://localhost/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://localhost/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://localhost/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://localhost/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://localhost/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://localhost/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://localhost/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://localhost/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://localhost/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://localhost/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://localhost/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://localhost/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://localhost/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://localhost/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://localhost/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://localhost/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://localhost/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://localhost/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://localhost/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://localhost/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://localhost/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://localhost/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://localhost/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://localhost/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://localhost/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://localhost/service-workers/push-notifications';
Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://localhost/notification-stream/notification-stream-data';
Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://localhost/api/friends/acceptfriendrequest';
Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://localhost/api/friends/declinefriendrequest';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/sets/get-by-creator'] = 'https://localhost/sets/get-by-creator';
Roblox.Endpoints.Urls['/sets/get-roblox-sets'] = 'https://localhost/sets/get-roblox-sets';
Roblox.Endpoints.Urls['/sets/get-subscribed'] = 'https://localhost/sets/get-subscribed';
Roblox.Endpoints.Urls['/ide/toolbox/items'] = 'https://localhost/ide/toolbox/items';
Roblox.Endpoints.Urls['/voting/studio/vote'] = 'https://localhost/voting/studio/vote';
Roblox.Endpoints.Urls['/voting/studio/unvote'] = 'https://localhost/voting/studio/unvote';
Roblox.Endpoints.Urls['/ide/insertasset'] = 'https://localhost/ide/insertasset';
Roblox.Endpoints.Urls['/groups/can-manage-games'] = 'https://localhost/groups/can-manage-games';
</script>

        <script type="text/javascript">

        var _gaq = _gaq || [];

        
		_gaq.push(['_setAccount', 'UA-43420590-3']);
		_gaq.push(['_setDomainName', 'roblox.com']);
       (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
            <script type="text/javascript">
            if (Roblox && Roblox.EventStream) {
                Roblox.EventStream.Init("/ecsv2.roblox.com/www/e.png",
                    "/ecsv2.roblox.com/www/e.png",
                    "/ecsv2.roblox.com/pe?t=studio",
                    "/ecsv2.roblox.com/pe?t=diagnostic");
            }
        </script>

</head>
<body ng-app="clientToolbox">
    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ClientToolboxLinks =
        {
            HeaderTemplateLink: "toolbox-header",
            SubnavTemplateLink: "toolbox-subnav",
            PaginationTemplateLink: "toolbox-pagination",
            AssetsTemplateLink: "toolbox-assets",
            ThumbnailTemplateLink: "toolbox-thumbnail",
            FooterTemplateLink: "toolbox-footer",
            GetSetsByCreatorLink: "/sets/get-by-creator",
            GetRobloxSetsLink: "/sets/get-roblox-sets",
            GetSubscribedSetsLink: "/sets/get-subscribed",
            GetAssetsLink: "/ide/toolbox/items",
            GetSetItemsLink: "/sets/0/items",
            VoteStudioLink: "/voting/studio/vote",
            UnvoteStudioLink: "/voting/studio/unvote",
            InsertAssetLink: "/ide/insertasset",
            GetGroupsCanManageGamesInLink: "/groups/can-manage-games"
        };
        Roblox.AssetType = {
            "10": "FreeModels",
            "13": "FreeDecals",
                "40": "FreeMeshes",
            "3": "FreeAudio"
        };
        Roblox.ClientToolboxModel = {
            // type cast to boolean for javascript
            IsUserAuthenticated: <?php echo json_encode($loggedIn); ?>,
            ContentUrl: "/asset/",
            UserId: <?php echo $userId; ?>,
            ShowGroupCategories: true,
        };
        Roblox.jsConsoleEnabled = false;
        Roblox.AreMeshesEnabled = true;
        Roblox.EnableNewToolboxSearch = true;
        Roblox.AreAudioShown = true;
    </script>
    <input name="__RequestVerificationToken" type="hidden" value="ih4CsjhsJJoAXkDOZzM0QGI7i5Qv8dITfldAx5dGjfXgJ7vqld9GMGIWNJ2DY8F8wALcDhqpYFJ0jj2hu8B7knL57Zs1"/>

<div id="image-retry-data" data-image-retry-max-times="10" data-image-retry-timer="1500" data-ga-logging-percent="10">
</div>
    <div roblox-toolbox>
        <div roblox-toolbox-header class="client-toolbox-header">
        </div>
            <div ng-controller="RobloxReferralLink" ng-show="showReferralLinks()" class="client-toolbox-referral-links">
                Try searching for:
                <a href ng-click="refer('NPC')">NPC</a>
                <a href ng-click="refer('Vehicle')">Vehicle</a>
                <a href ng-click="refer('Weapon')">Weapon</a>
                <a href ng-click="refer('Building')">Building</a>
                <a href ng-click="refer('Light')">Light</a>
            </div>
        <div roblox-toolbox-subnav class="client-toolbox-subnav">

        </div>
        <div roblox-toolbox-assets class="client-toolbox-content">
        </div>

        <div roblox-toolbox-pagination class="client-toolbox-subnav">

        </div>

        <div roblox-toolbox-footer class="client-toolbox-footer">

        </div>
    </div>
    
    
    
    
    
    
    
    
    <div ng-modules="pageTemplateApp">
        <script type="text/javascript" src="/js.rbxcdn.com/bfab7bc5f28fa9a44c2ae4b08d14af3c.js.gzip"></script>
    </div>
</body>

</html>