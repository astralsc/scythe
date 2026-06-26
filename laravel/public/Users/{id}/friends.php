<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
?>

<?php
include __DIR__ . '/../../config/db.php';
include __DIR__ . '/../../config/config.php';

$user = null;
$loggedIn = false;
$userId = -1;
$username = 'unknown';
$displayname = 'unknown';
$robux = 0;
$tickets = 0;
$theme = 'light';

if (isset($_COOKIE['_ROBLOSECURITY'])) {
    $token = $_COOKIE['_ROBLOSECURITY'];

    $stmt = $DBReq->prepare("
        SELECT id, username, displayname, isbanned, robux, tickets, roblosecurity, theme
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
        $robux = $user['robux'];
        $tickets = $user['tickets'];

        if ($user['isbanned'] == 1) {
            header("Location: /not-approved");
            exit();
        }

        $theme = ($user['theme'] === 'Dark') ? 'dark' : 'light';
    } else {
    }
} else {
}

$banner = $bannerEnabled; // announcment
$bannerLabel = $bannerText; // announcment
?>

<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: WEB92 -->
    <title>Friends - SCYTHE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ROBLOX Corporation"/>
    <meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration."/>
    <meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine"/>
    <meta name="apple-itunes-app" content="app-id=431946152"/>
    <meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY"/>

    <link href="/images.rbxcdn.com/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">

    <link rel="canonical" href="/users/1/friends"/>


<link rel="stylesheet" href="/static.rbxcdn.com/css/leanbase___f4afe50634665e117ef626eed04f6a3b_m.css/fetch"/>



<link rel="stylesheet" href="/static.rbxcdn.com/css/page___7d1d1aa75074391844fc69c9dc780b89_m.css/fetch"/>




    <script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>



    <script type="text/javascript" src="/js.rbxcdn.com/379cff48ae23ba8f6ba4ce43ff9630f7.js"></script>




        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link href="/images.rbxcdn.com/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon"/>

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.AdsHelper = Roblox.AdsHelper || {};
    Roblox.AdsLibrary = Roblox.AdsLibrary || {};

    Roblox.AdsHelper.toggleAdsSlot = function (slotId, GPTRandomSlotIdentifier) {
        var gutterAdsEnabled = false;
        if (gutterAdsEnabled) {
            googletag.display(GPTRandomSlotIdentifier);
            return;
        }

        if (typeof slotId !== 'undefined' && slotId && slotId.length > 0) {
            var slotElm = $("#"+slotId);
            if (slotElm.is(":visible")) {
                googletag.display(GPTRandomSlotIdentifier);
            }else {
                var adParam = Roblox.AdsLibrary.adsParameters[slotId];
                if (adParam) {
                    adParam.template = slotElm.html();
                    slotElm.empty();
                }
            }
        }
    }
</script><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>



    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

        var _gaq = _gaq || [];

            window.GoogleAnalyticsDisableRoblox2 = true;
        _gaq.push(['b._setAccount', 'UA-486632-1']);
        _gaq.push(['b._setCampSourceKey', 'rbx_source']);
        _gaq.push(['b._setCampMediumKey', 'rbx_medium']);
        _gaq.push(['b._setCampContentKey', 'rbx_campaign']);

            _gaq.push(['b._setDomainName', 'roblox.com']);

            _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Anonymous', 2]);
                _gaq.push(['b._setPageGroup', 1, 'Friends']);
    _gaq.push(['b._trackPageview']);


        _gaq.push(['c._setAccount', 'UA-26810151-2']);
            _gaq.push(['c._setDomainName', 'roblox.com']);
                    _gaq.push(['c._setPageGroup', 1, 'Friends']);

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



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>        <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = '/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.roblox.com/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = '/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = '/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.roblox.com/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.roblox.com/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.roblox.com/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.roblox.com/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.roblox.com/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.roblox.com/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.roblox.com/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.roblox.com/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = '/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = '/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = '/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://misc.roblox.com/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = '/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = '/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = '/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = '/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = '/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.roblox.com/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.roblox.com/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.roblox.com/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.roblox.com/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.roblox.com/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.roblox.com/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.roblox.com/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.roblox.com/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.roblox.com/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = '/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = '/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = '/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = '/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = '/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = '/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = '/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = '/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = '/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = '/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = '/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = '/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = '/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = '/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = '/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = '/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = '/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = '/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = '/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = '/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = '/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = '/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = '/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = '/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = '/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = '/service-workers/push-notifications';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

</head>
<body id="rbx-body" class="" data-performance-relative-value="0.5" data-internal-page-name="Friends" data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>

<div id="image-retry-data" data-image-retry-max-times="10" data-image-retry-timer="1500">
</div>
<div id="http-retry-data" data-http-retry-max-timeout="8000" data-http-retry-base-timeout="1000">
</div>




<div id="fb-root"></div>

<?php pageBuilder::buildHeader(); ?>

<script type="text/javascript">
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

    <div class="container-main    ">
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
        <noscript><div class="SystemAlert"><div class="alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
        <?php if (!empty($banner)): ?>
        <div /*style="background-color: green";*/ class="alert-info" role="alert"><?php echo $bannerLabel;?></div>
        <?php endif; ?>
        <div class="content  ">



<script type="text/javascript">
    Roblox.uiBootstrap = {};
    Roblox.uiBootstrap = {
        tooltipPopupTemplateLink: "/viewapp/common/template/tooltip/tooltip-popup.html",
        tooltipHtmlUnsafePopupTemplateLink: "/viewapp/common/template/tooltip/tooltip-html-unsafe-popup.html"
    };
    Roblox.FriendsTemplates = {
        CardMenuTemplateLink: "friend-card-menu"
    }
</script>


<div id="state-properties" data-userid="1" data-loggedinuserid="0" data-removefriendurl="/api/friends/removefriend" data-acceptfriendurl="/api/friends/acceptfriendrequest" data-declinefriendurl="/api/friends/declinefriendrequest" data-declineallfriendsurl="/api/friends/declineallfriendrequests" data-followurl="/user/follow" data-unfollowurl="/api/user/unfollow" data-unfriendurl="/api/friends/removefriend" data-username="ROBLOX"></div>


<div class="row page-content" ng-modules="robloxApp, ui.bootstrap, friends, robloxApp.helpers" ng-cloak ng-controller="friendsController">
    <h1 ng-show="currentData.isMyProfile" class="friends-title">My Friends</h1>
    <h1 ng-hide="currentData.isMyProfile" class="friends-title">{{ currentData.userName }}'s Friends</h1>
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li id="friends" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'friends', 'subtract-item': !currentData.isMyProfile}" ui-sref="friends">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Friends</span>
                </a>
            </li>
            <li id="following" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'following', 'subtract-item': !currentData.isMyProfile}" ui-sref="following">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Following</span>
                </a>
            </li>
            <li id="followers" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'followers', 'subtract-item': !currentData.isMyProfile}" ui-sref="followers">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Followers</span>
                </a>
            </li>
            <li id="requests" class="rbx-tab" ng-show="currentData.isMyProfile" ng-class="{'active': currentData.activeTab == 'friend-requests', 'subtract-item': !currentData.isMyProfile}" ui-sref="friend-requests">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Requests</span>
                </a>
            </li>
        </ul>
        <div class="friends-content" ng-class="{'hide-template': !currentData.templateVisible}">
    <h3 class="friends-subtitle">{{ currentData.stateLabel }} ({{ friendsContent.friends.data.TotalFriends | number }})</h3>
    <button ng-show="currentData.activeTab == 'friend-requests' &amp;&amp; friendsContent.friends.data.TotalFriends > 0" type="button" class="btn-fixed-width btn-control-xs ignore-button" ng-click="declineAllFriendRequests()" ng-disabled="disabled">Ignore All</button>
    <span class="tooltip-container" data-toggle="tooltip" data-toggle-mobile="true" title="{{ currentData.tooltipLabel }}">
        <span class="icon-moreinfo"></span>
    </span>
    <div class="tab-content rbx-tab-content" ui-view>
        <ul class="hlist avatar-cards">
            <li ng-repeat="friend in friendsContent.friends.data.Friends" class="list-item avatar-card friends-container" ng-show="friend.UserId &amp;&amp; !currentData.ignoreAll &amp;&amp; friend.isAvailable">
                <div class="avatar-card-container" ng-class="{'disabled': friend.IsDeleted}">
                    <div class="avatar-card-content">
                        <div class="avatar-card-fullbody">
                            <a ng-href="{{friend.AbsoluteURL}}" class="avatar-card-link" ng-if="!friend.IsDeleted">
                                <img ng-class="{'online': friend.IsOnline &amp;&amp; !friend.InGame &amp;&amp; !friend.InStudio, 'game': friend.InGame &amp;&amp; friend.IsOnline, 'studio': friend.InStudio &amp;&amp; friend.IsOnline}" class="avatar-card-image" ng-src="{{ friend.AvatarUri }}" thumbnail="friend.Thumbnail" image-retry/>
                            </a>
                            <img ng-if="friend.IsDeleted" class="avatar-card-image" ng-src="{{ friend.AvatarUri }}" thumbnail="friend.Thumbnail" image-retry/>
                            <div ng-hide="currentData.activeTab == 'followers' || currentData.activeTab == 'friend-requests'" ng-if="!friend.IsDeleted">
                                <a ng-href="{{ friend.AbsoluteURL}}" class="avatar-status"> <span ng-show="friend.IsOnline &amp;&amp; !friend.InGame &amp;&amp; !friend.InStudio" class="icon-online" title="{{friend.LastLocation}}"></span></a>
                                <a ng-href="{{ friend.AbsolutePlaceURL }}" class="avatar-status"><span ng-show="friend.InGame &amp;&amp; friend.IsOnline" class="icon-game" title="{{friend.LastLocation}}"></span></a>
                                <div class="avatar-status"><span ng-show="friend.InStudio &amp;&amp; friend.IsOnline" class="icon-studio" title="{{friend.LastLocation}}"></span></div>
                            </div>
                        </div>
                        <div class="avatar-card-caption">
                            <div id="{{ friend.UserId }}" class="text-overflow">
                                <a ng-href="{{friend.AbsoluteURL}}" title="{{friend.Username}}" ng-if="!friend.IsDeleted" class="avatar-name">{{ friend.Username }}</a>
                                <span title="{{friend.Username}}" ng-if="friend.IsDeleted" class="avatar-name">{{ friend.Username }}</span>
                            </div>
                            <div class="avatar-card-label" ng-if="!friend.IsDeleted">{{friend.IsOnline ? "Online" : "Offline"}}</div>
                            <div class="avatar-card-label" ng-if="friend.IsDeleted">User has been restricted</div>
                            <div ng-show="currentData.activeTab == 'friends' || (currentData.activeTab == 'following' &amp;&amp; friend.IsFollowed)" class="avatar-status-container">
                                <div ng-show="friend.IsOnline &amp;&amp; !friend.InGame &amp;&amp; !friend.InStudio" class="avatar-card-label">Website</div>
                                <div ng-show="friend.InGame &amp;&amp; friend.IsOnline">
                                    <div class="text-label small">Playing</div>
                                    <a ng-href="{{ friend.AbsolutePlaceURL }}" class="text-link text-overflow avatar-status-link">
                                        {{ friend.LastLocation }}
                                    </a>
                                </div>

                                <div ng-show="friend.InStudio &amp;&amp; friend.IsOnline">
                                    <div class="text-label small">Working</div>
                                    <div class="text-link text-overflow avatar-status-link">
                                        {{ friend.LastLocation }}
                                    </div>
                                </div>
                            </div>
                            <div ng-show="currentData.activeTab == 'following' &amp;&amp; !friend.IsFollowed" class="avatar-card-label fail" ng-cloak>Unfollowed</div>
                        </div>
                        <div class="avatar-card-menu" card-menu id="{{friend.UserId}}" ng-if="hasMenu(currentData, friend)">
                        </div>
                    </div> <!-- avatar-card-content-->
                    <div class="avatar-card-btns" ng-show="currentData.hasBtns">
                        <button type="button" class="btn-control-md ignore-friend" ng-click="declineFriendRequest(friend.UserId, friend,currentData.currentPage)">Ignore</button>
                        <button type="button" class="btn-secondary-md accept-friend" ng-click="acceptFriendRequest(friend.UserId, friend,currentData.currentPage)">Accept</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="pager-holder">
    <ul class="pager" ng-show="currentData.totalPages > 1">
        <li class="pager-prev" ng-class="{'disabled': (currentData.currentPage /18) + 1 == 1}">
            <a ng-click="newPage(((currentData.currentPage /18) - 1))"><span class="icon-left"></span></a>
        </li>
        <li class="pager-cur">
            <span>{{(currentData.currentPage /18) + 1}}</span>
        </li>
        <li class="pager-total">
            <span class="fixed-spacing">of</span>
            <span>{{currentData.totalPages | number }}</span>
        </li>
        <li class="pager-next" ng-class="{'disabled': (currentData.currentPage /18) + 1 == currentData.totalPages}">
            <a ng-click="newPage(((currentData.currentPage /18) + 1))"><span class="icon-right"></span></a>
        </li>
    </ul>
</div>
        <script type="text/ng-template" id="friend-card-menu">
    <div class="card-menu-container">
        <a class="rbx-menu-item" data-toggle="popover" data-bind="friend-popover-content-{{friend.UserId}}">
            <span class="icon-more"></span>
        </a>
        <div class="rbx-popover-content" data-toggle="friend-popover-content-{{friend.UserId}}">
            <ul class="dropdown-menu" role="menu"
                id="menu-{{friend.UserId}}" ng-if="currentData.activeTab == 'following'">
                <li ng-show="friend.IsFollowed || friend.IsDeleted">
                    <a class="friend-unfollow">Unfollow</a>
                </li>
                <li ng-show="!friend.IsFollowed">
                    <a class="friend-follow">Follow</a>
                </li>
            </ul>
            <ul class="dropdown-menu" role="menu"
                id="menu-{{friend.UserId}}" ng-if="currentData.activeTab == 'friends'">
                <li ng-show="friend.IsDeleted">
                    <a class="friend-unfriend">Unfriend</a>
                </li>
            </ul>
        </div>
    </div>
</script>
    </div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="current-user-reached-friends-max.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Unable to process Request.You currently have the max number of Friends allowed. </p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">Unfriend someone before accepting any more Friend Requests.</p>
            </div><!-- /.modal-content -->
    </script>
</div><div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="requester-reached-friends-max.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Unable to process Request. That user currently has the max number of Friends allowed.</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">You can not accept their Friend Request until they remove a Friend.</p>
            </div><!-- /.modal-content -->
    </script>
</div><div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="something-went-wrong.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Something went wrong.</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">Please check back in few minutes.</p>
            </div><!-- /.modal-content -->
    </script>
</div>
</div>

        </div>
            </div>

<?php pageBuilder::buildFooter(); ?>


</div>



    <script type="text/javascript">function urchinTracker() {}</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-game-launch-interface-enabled="False" data-is-protocol-handler-launch-enabled="False" data-is-user-logged-in="<?php echo json_encode($loggedIn); ?>" data-os-name="Unknown" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="/images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress"/>
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                Starting Roblox...
            </div>
            <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
            <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
        </div>
        <div style="text-align:center;margin-top:1em">
            <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel"/>
        </div>
    </div>
</div>
<div id="ProtocolHandlerStartingDialog" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">

        </div>
        <div class="ph-logo-row">
            <img src="/images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R"/>
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="/images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24"/>
            </div>
        </div>
    </div>
</div>
<div id="ProtocolHandlerAreYouInstalled" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R"/>
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                You're moments away from getting into the game!
            </p>
            <div>
                <button type="button" class="btn btn-primary-md" id="ProtocolHandlerInstallButton">
                    Download and Install ROBLOX
                </button>
            </div>
            <div class="small">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="text-name" target="_blank">Click here for help</a>
            </div>

        </div>
    </div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
    <p class="larger-font-size">
        <span class="icon-moreinfo"></span>
        Check <b>Remember my choice</b> and click
            <img src="/images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application"/>
        in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd"></div>
        <div id="videoPrerollLoadingDiv">
            Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
                <div id="videoPrerollLoadingBarCompleted">
                </div>
            </div>
        </div>
        <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            if (Roblox.VideoPreRoll) {
                Roblox.VideoPreRoll.showVideoPreRoll = false;
                Roblox.VideoPreRoll.isPrerollShownEveryXMinutesEnabled = true;
                Roblox.VideoPreRoll.loadingBarMaxTime = 33000;
                Roblox.VideoPreRoll.videoOptions.key = "robloxcorporation";
                    Roblox.VideoPreRoll.videoOptions.categories = "AgeUnknown,GenderUnknown";
                                     Roblox.VideoPreRoll.videoOptions.id = "games";
                Roblox.VideoPreRoll.videoLoadingTimeout = 11000;
                Roblox.VideoPreRoll.videoPlayingTimeout = 41000;
                Roblox.VideoPreRoll.videoLogNote = "NotWindows";
                Roblox.VideoPreRoll.logsEnabled = true;
                Roblox.VideoPreRoll.excludedPlaceIds = "32373412";
                Roblox.VideoPreRoll.adTime = 15;

                Roblox.VideoPreRoll.specificAdOnPlacePageEnabled = true;
                Roblox.VideoPreRoll.specificAdOnPlacePageId = 192800;
                Roblox.VideoPreRoll.specificAdOnPlacePageCategory = "stooges";


                Roblox.VideoPreRoll.specificAdOnPlacePage2Enabled = true;
                Roblox.VideoPreRoll.specificAdOnPlacePage2Id = 2370766;
                Roblox.VideoPreRoll.specificAdOnPlacePage2Category = "lego";

                $(Roblox.VideoPreRoll.checkEligibility);
            }
        });
    </script>


<div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
    </div>
    <div class="Title">
        Choose Your Avatar
    </div>
    <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>

        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
                <a href="/?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Ffriends"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="/newlogin?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Ffriends">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
                 window.location = '/install/unsupported.aspx'; return false;
    }

</script>
                        <style>
                            #win_firefox_install_img .activation {
                            }

                            #win_firefox_install_img .installation {
                                width: 869px;
                                height: 331px;
                            }

                            #mac_firefox_install_img .activation {
                            }

                            #mac_firefox_install_img .installation {
                                width: 250px;
                            }

                            #win_chrome_install_img .activation {
                            }

                            #win_chrome_install_img .installation {
                            }

                            #mac_chrome_install_img .activation {
                                width: 250px;
                            }

                            #mac_chrome_install_img .installation {
                            }
                        </style>
                        <div id="InstallationInstructions" class="modalPopup blueAndWhite" style="display:none;overflow:hidden">
                            <a id="CancelButton2" onclick="return Roblox.Client._onCancel();" class="ImageButton closeBtnCircle_35h ABCloseCircle"></a>
                            <div style="padding-bottom:10px;text-align:center">
                                <br/><br/>
                            </div>
                        </div>


<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type="text/javascript" src="/js.rbxcdn.com/1ba208cf31fb5a6a592b902955c8770b.js"></script>

<script type="text/javascript">
    Roblox.Client._skip = '/install/unsupported.aspx';
    Roblox.Client._CLSID = '';
    Roblox.Client._installHost = '';
    Roblox.Client.ImplementsProxy = false;
    Roblox.Client._silentModeEnabled = false;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = false;


        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }

    </script>


<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image"/>
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer GenericModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">

        </div>
    </div>
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>

<div id="modal-confirmation" class="modal-confirmation" data-modal-type="confirmation">
    <div id="modal-dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5 class="modal-title"></h5>
            </div>

            <div class="modal-body">
                <div class="modal-top-body">
                    <div class="modal-message"></div>
                    <div class="modal-image-container roblox-item-image" data-image-size="medium" data-no-overlays data-no-click>
                        <img class="modal-thumb" alt="generic image"/>
                    </div>
                </div>
                <div class="modal-btns">
                    <a href id="confirm-btn"><span></span></a>
                    <a href id="decline-btn"><span></span></a>
                </div>
                <div class="loading modal-processing">
                    <img class="loading-default" src="/images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="Processing..."/>
                </div>
            </div>
            <div class="modal-footer text-footer">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.Dialog = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>




<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
</script>



    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'roblox.com';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });

                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });


                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });


                Roblox.CookieUpgrader.upgrade("RBXEventTrackerV2", {expires: Roblox.CookieUpgrader.thirtyYearsFromNow});

        });
    </script>



    <script type="text/javascript" src="/js.rbxcdn.com/8c4c48a91e15383252a8c98406350e46.js"></script>



<script type="text/javascript" src="/js.rbxcdn.com/24f54403749ecc1b47179d3b2953b4d0.js"></script>
                    <script type="text/javascript" src="/js.rbxcdn.com/822491cace41a2d39fd76db6cfd17800.js"></script>



    <script type="text/javascript">Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/c14a216bd7773e7b637b4e6c3c2e619d.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/4acfdab2e6131feb84d783765b82a888.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/6bac93e9bb6716f32f09db749cec330b.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8db82e6d725b907e91441b849cc35e47.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>


    <script>
        Roblox.XsrfToken.setToken('NoVpeqCVbwlC');
    </script>

        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    <script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>


<script type="text/javascript">
    $(function(){
        function trackReturns() {
            function dayDiff(d1, d2) {
                return Math.floor((d1-d2)/86400000);
            }
            if (!localStorage) {
                return false;
            }

            var cookieName = 'RBXReturn';
            var cookieOptions = {expires:9001};
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};

            try {
                cookie = JSON.parse(cookieStr);
            } catch (ex) {
                // busted cookie string from old previous version of the code
            }

            try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                    localStorage.setItem(cookieName, JSON.stringify({ ts: new Date().toDateString() }));
                    return false;
                }
            } catch (ex) {
                return false;
            }

            var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
            if (daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_odr', {});
                cookie.odr = 1;
            }
            if (daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
                cookie.sdr = 1;
            }
            try {
                localStorage.setItem(cookieName, JSON.stringify(cookie));
            } catch (ex) {
                return false;
            }
        }

        GoogleListener.init();



        RobloxEventManager.initialize(true);
        RobloxEventManager.triggerEvent('rbx_evt_pageview');
        trackReturns();



        RobloxEventManager._idleInterval = 450000;
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
        RobloxEventManager.startMonitor();


    });

</script>






<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        //<sl:translate>
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
    };
</script>


    <script type="text/javascript" src="/js.rbxcdn.com/b4a53ce4fe2f469dac30ed6c80cb01ab.js"></script>




    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="http://b.scorecardresearch.com/p?c1=2&amp;c2=&amp;c3=&amp;c4=&amp;c5=&amp;c6=&amp;c15=&amp;cv=2.0&amp;cj=1"/>
    </noscript>
</body>
</html>
