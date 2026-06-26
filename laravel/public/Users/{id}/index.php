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
    <!-- MachineID: WEB362 -->
    <title>ROBLOX - SCYTHE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation"/>
<meta name="description" content="ROBLOX is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. ROBLOX is the creator of Welcome to ROBLOX Building which has been played 22M+ times. Join ROBLOX on ROBLOX and explore together!"/>
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine"/>
<meta name="apple-itunes-app" content="app-id=431946152"/>
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY"/>
    <meta property="og:site_name" content="ROBLOX"/>
    <meta property="og:title" content="ROBLOX's Profile"/>
    <meta property="og:type" content="profile"/>
    <meta property="og:url" content="/users/1/profile"/>
    <meta property="og:description" content="ROBLOX is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. ROBLOX is the creator of Welcome to ROBLOX Building which has been played 22M+ times. Join ROBLOX on ROBLOX and explore together!"/>
    <meta property="og:image" content="https://web.archive.org/web/20160807101858/https://t5.rbxcdn.com/d32240edeabb4d87591d9cc9cf5dcb52"/>
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="ROBLOX's Profile">
    <meta name="twitter:description" content="ROBLOX is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. ROBLOX is the creator of Welcome to ROBLOX Building which has been played 22M+ times. Join ROBLOX on ROBLOX and explore together!">
    <meta name="twitter:creator">
    <meta name="twitter:image1" content="https://web.archive.org/web/20160807101858/https://t5.rbxcdn.com/d32240edeabb4d87591d9cc9cf5dcb52"/>
    <meta name="twitter:app:country" content="US">
    <meta name="twitter:app:name:iphone" content="ROBLOX Mobile">
    <meta name="twitter:app:id:iphone" content="431946152">
    <meta name="twitter:app:url:iphone">
    <meta name="twitter:app:name:ipad" content="ROBLOX Mobile">
    <meta name="twitter:app:id:ipad" content="431946152">
    <meta name="twitter:app:url:ipad">
    <meta name="twitter:app:name:googleplay" content="ROBLOX">
    <meta name="twitter:app:id:googleplay" content="com.roblox.client">
    <meta name="twitter:app:url:googleplay"/>


    <link href="/favicon.ico" rel="icon"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">

    <link rel="canonical" href="/users/1/profile"/>


<link rel="stylesheet" href="/static.rbxcdn.com/css/leanbase___3b81177a5c6ab46f332db21af93fd4ca_m.css/fetch"/>



<link rel="stylesheet" href="/static.rbxcdn.com/css/page___9844eaa8a26aa3d494730ed1ec719db4_m.css/fetch"/>




    <script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>



    <script type="text/javascript" src="/js.rbxcdn.com/772ab381c3064441d07dc1235c79872c.js"></script>




        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link href="/favicon.ico" rel="icon"/>

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
</script>    <script type="text/javascript">
        $(function () {
            RobloxEventManager.triggerEvent('rbx_evt_newuser', {});
        });

    </script>

    <script type="text/javascript">
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("html_head");
        }
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
                _gaq.push(['b._setPageGroup', 1, 'Profile']);

                    var eventsArr = ['b._setCustomVar', 2, 'FirstTimeVisitor', 'true', 3];
                    _gaq.push(eventsArr);
                    $(function() {
                        if(GoogleAnalyticsEvents) {
                            GoogleAnalyticsEvents.Log(eventsArr);
                        }
                    });

    _gaq.push(['b._trackPageview']);


        _gaq.push(['c._setAccount', 'UA-26810151-2']);
            _gaq.push(['c._setDomainName', 'roblox.com']);
                    _gaq.push(['c._setPageGroup', 1, 'Profile']);

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
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = '/game-auth/getauthticket';
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
Roblox.Endpoints.Urls['/chat/chat'] = '/chat/chat';
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
<body id="rbx-body" class="" data-performance-relative-value="0.5" data-internal-page-name="Profile" data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm" data-as-http-regex="((blog|wiki|[^.]help|corp|polls|bloxcon|developer|devforum)\.roblox\.com|robloxlabs\.com)"></div>

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

    <div class="container-main


                ">
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
        <noscript><div class="SystemAlert"><div class="alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
        <?php if (!empty($banner)): ?>
        <div /*style="background-color: green";*/ class="alert-info" role="alert"><?php echo $bannerLabel;?></div>
        <?php endif; ?>
        <div class="content ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">


<iframe name="Roblox_Profile_Top_728x90" allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>

                </div>




<script type="text/javascript">
    var Roblox = Roblox || {};
</script>

<div class="profile-container" ng-modules="robloxApp, profile, robloxApp.helpers">


<div class="section profile-header">

    <div class="section-content profile-header-content" ng-controller="profileHeaderController">


<div data-userid="0" data-profileuserid="1" data-profileusername="ROBLOX" data-friendscount="0" data-followerscount="429273" data-followingscount="0" data-acceptfriendrequesturl="/api/friends/acceptfriendrequest" data-incomingfriendrequestid="0" data-arefriends="false" data-friendurl="/users/1/friends#!/friends" data-incomingfriendrequestpending="false" data-maysendfriendinvitation="false" data-friendrequestpending="false" data-sendfriendrequesturl="/api/friends/sendfriendrequest" data-removefriendrequesturl="/api/friends/removefriend" data-promptforpushregistrationonfriendrequest="false" data-mayfollow="false" data-isfollowing="false" data-followurl="/user/follow" data-unfollowurl="/api/user/unfollow" data-canmessage="true" data-messageurl="/messages/compose?recipientId=1" data-canbefollowed="false" data-cantrade="false" data-isblockbuttonvisible="false" data-getfollowscript="" data-ismorebtnvisible="false" data-isvieweeblocked="false" data-mayimpersonate="false" data-impersonateurl="" data-mayupdatestatus="false" data-updatestatusurl="" data-statustext="Welcome to ROBLOX, the Imagination Platform. Make friends, explore, and play games!" data-editstatusmaxlength="254" profile-header-data profile-header-layout="profileHeaderLayout" class="hidden"></div>
        <div class="profile-header-top">
        <div class="avatar avatar-headshot-lg card-plain profile-avatar-image">
            <span class="avatar-card-link avatar-image-link">
                <img alt="ROBLOX" class="avatar-card-image profile-avatar-thumb" ng-src="{{ 'https://t4.rbxcdn.com/4d4d5309c2bebaddaa921a886138aaa7' }}" src="https://t4.rbxcdn.com/4d4d5309c2bebaddaa921a886138aaa7" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t4.rbxcdn.com/4d4d5309c2bebaddaa921a886138aaa7&quot;,&quot;RetryUrl&quot;:null}" image-retry>
             </span>
            <script type="text/javascript">
                $("img.profile-avatar-thumb").on('load', function() {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("head_avatar");
                    }
                });
            </script>
        </div>
            <div class="header-caption">
                <div class="header-title">
                    <h2>ROBLOX</h2>
                        <span class="icon-obc"></span>
                </div>
                <div class="header-details">
                    <ul class="details-info">
                        <li>
                            <div class="text-label">Friends</div>
                            <a class="text-name" href="/users/1/friends#!/friends" ng-cloak>
                                <h3>
                                    {{profileHeaderLayout.friendsCount | number }}
                                </h3>
                            </a>
                        </li>
                        <li>
                            <div class="text-label">Followers</div>
                            <a class="text-name" href="/users/1/friends#!/followers" ng-cloak>
                                <h3>{{profileHeaderLayout.followersCount | abbreviate }}</h3>
                            </a>
                        </li>
                        <li>
                            <div class="text-label">Following</div>
                            <a class="text-name" href="/users/1/friends#!/following" ng-cloak>
                                <h3>
                                    {{profileHeaderLayout.followingsCount}}
                                </h3>
                            </a>
                        </li>
                    </ul>
                        <ul class="details-actions desktop-action">
                            <li class="btn-friends" ng-if="!profileHeaderLayout.areFriends" ng-cloak>
                                <button ng-if="profileHeaderLayout.incomingFriendRequestPending" ng-cloak class="btn-control-md" data-target-url="/api/friends/acceptfriendrequest" data-friend-request-id="0" data-target-user-id="1" data-friends-url="/users/1/friends#!/friends" ng-click="acceptFriendRequest()">
                                    Accept
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                                &amp;&amp; profileHeaderLayout.maySendFriendInvitation" ng-cloak class="btn-control-md" ng-click="sendFriendRequest()">
                                    Add Friend
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                                            &amp;&amp; profileHeaderLayout.friendRequestPending" ng-cloak class="btn-control-md disabled">
                                    Pending
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                                            &amp;&amp; !profileHeaderLayout.friendRequestPending" ng-cloak class="btn-control-md disabled">
                                    Add Friend
                                </button>
                            </li>
                            <li class="btn-friends" ng-if="profileHeaderLayout.areFriends" ng-cloak>
                                <button class="btn-control-md" data-target-url="/api/friends/removefriend" data-target-user-id="1" ng-mouseenter="hover = true" ng-mouseleave="hover =false" ng-class="{'btn-unfollow': hover}" ng-click="removeFriend()">
                                    Unfriend
                                </button>
                            </li>
                            <li class="btn-messages">
                                <button class="btn-control-md" ng-disabled="!profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0" ng-click="sendMessage()" ng-cloak>
                                    Message
                                </button>
                            </li>
                            <li class="btn-join-game" ng-if="profileHeaderLayout.canBeFollowed">
                                <button class="profile-join-game btn-primary-md" ng-cloak>
                                    Join Game
                                </button>
                            </li>
                        </ul>
                        <ul class="details-actions mobile-action" ng-class="{'three-item-list': profileHeaderLayout.canBeFollowed}">
                            <li class="btn-friends" ng-if="!profileHeaderLayout.areFriends" ng-cloak>
                                <a ng-if="profileHeaderLayout.incomingFriendRequestPending" ng-cloak data-target-url="/api/friends/acceptfriendrequest" data-friend-request-id="0" data-target-user-id="1" data-friends-url="/users/1/friends#!/friends" class="action-add-friend" ng-click="acceptFriendRequest()">
                                    <div class="icon-add-friend"></div>
                                    <div class="text-label small">Accept</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                &amp;&amp; profileHeaderLayout.maySendFriendInvitation" class="action-add-friend" ng-cloak ng-click="sendFriendRequest()">
                                    <div class="icon-add-friend"></div>
                                    <div class="text-label small">Add Friend</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                            &amp;&amp; profileHeaderLayout.friendRequestPending" ng-cloak class="action-friend-pending">
                                    <div class="icon-friend-pending"></div>
                                    <div class="text-label small">Pending</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                            &amp;&amp; !profileHeaderLayout.maySendFriendInvitation
                            &amp;&amp; !profileHeaderLayout.friendRequestPending" ng-cloak class="action-friend-pending">
                                    <div class="icon-friend-pending"></div>
                                    <div class="text-label small">Add Friend</div>
                                </a>
                            </li>
                            <li class="btn-friends" ng-if="profileHeaderLayout.areFriends" ng-cloak>
                                <a data-target-url="/api/friends/removefriend" data-target-user-id="1" ng-mouseenter="hover = true" ng-mouseleave="hover =false" ng-class="{'btn-unfollow': hover}" ng-click="removeFriend()" class="action-remove-friend">
                                    <div class="icon-remove-friend"></div>
                                    <div class="text-label small">Unfriend</div>
                                </a>
                            </li>
                            <li class="btn-messages center-icon">
                                <div ng-if="!(profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0)" class="action-message-disabled" ng-cloak>
                                    <div class="icon-send-message-disabled"></div>
                                    <div class="text-label small">Message</div>
                                </div>
                                <a ng-if="profileHeaderLayout.canMessage || profileHeaderLayout.userId == 0" ng-click="sendMessage()" class="action-message" ng-cloak>
                                    <div class="icon-send-message"></div>
                                    <div class="text-label small">Message</div>
                                </a>
                            </li>
                            <li class="btn-join-game last-icon" ng-if="profileHeaderLayout.canBeFollowed">
                                <a class="profile-join-game action-join-game" ng-cloak>
                                    <div class="icon-join-game"></div>
                                    <div class="text-label small">Join Game</div>
                                </a>
                            </li>
                        </ul>
                </div><!--header-details-->
<div class="header-userstatus">
    <div class="header-userstatus-text" ng-hide="profileHeaderLayout.statusFormShown">
        <span id="userStatusText" class="text-overflow" ng-class="{'userstatus-editable' : profileHeaderLayout.mayUpdateStatus}" ng-bind="profileHeaderLayout.statusText | statusfilter" ng-click="revealStatusForm()" ng-cloak></span>
    </div>
</div>
            </div>
        </div>
        <p ng-show="profileHeaderLayout.hasError" ng-cloak class="small text-error header-details-error">{{profileHeaderLayout.errorMsg}}</p>
        <div id="profile-header-more" class="profile-header-more" ng-show="profileHeaderLayout.isMoreBtnVisible" ng-cloak>
            <a id="popover-link" class="rbx-menu-item" data-toggle="popover" data-bind="profile-header-popover-content">
                <span class="icon-more"></span>
            </a>
            <div id="popover-content" class="rbx-popover-content" data-toggle="profile-header-popover-content">
                <ul class="dropdown-menu" role="menu">
                    <li ng-show="profileHeaderLayout.mayFollow" ng-cloak>
                        <a ng-bind="profileHeaderLayout.isFollowing ? 'Unfollow' : 'Follow'" ng-click="follow()" id="profile-follow-user" ng-cloak></a>
                    </li>
                        <li ng-show="profileHeaderLayout.canTrade" ng-cloak><a ng-click="tradeItems()" id="profile-trade-items">Trade Items</a></li>
                    <li ng-show="profileHeaderLayout.isBlockButtonVisible" ng-cloak>
                        <a ng-bind="!profileHeaderLayout.isVieweeBlocked ? 'Block User' : 'Unblock User'" ng-click="blockUser()" id="profile-block-user" ng-cloak></a>
                    </li>
                                                                            </ul>
            </div>
            <script type="text/javascript">
                $(function() {
                    $(".details-actions, .mobile-details-actions").on("click touchstart", ".profile-join-game", function() {
                        // NOTE: global var set due to legacy game launch code.
                        play_placeId = 0;

                    });
                });
            </script>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-block-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unblock this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Unblock
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-unblock-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to block this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Block
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
                <p class="small modal-footer-note">When you&#39;ve blocked a user, neither of you can directly contact the other.</p>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div><!--profile-header-content-->
</div><!-- profile-header -->
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li class="rbx-tab active">
                <a class="rbx-tab-heading" href="#about" id="tab-about">
                    <span class="text-lead">About</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
            <li class="rbx-tab">
                <a class="rbx-tab-heading" href="#creations" id="tab-creations">
                    <span class="text-lead">Creations</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section profile-about" ng-controller="profileUtilitiesController">
    <div class="container-header">
        <h3>About</h3>
    </div>
    <div class="section-content">
        <div class="profile-about-content">
            <p class="para-overflow-toggle para-height para-overflow-page-loading">
                <span class="profile-about-content-text" ng-non-bindable>Welcome to the ROBLOX profile! This is where you can check out the newest items in the catalog, and get a jumpstart on exploring and building on our Imagination Platform. If you want news on updates to the ROBLOX platform, or great new experiences to play with friends, check out blog.ROBLOX.com. Please note, this is an automated account. If you need to reach ROBLOX for any customer service needs find help at www.roblox.com/help</span>
                <span class="toggle-para">Read More</span>
            </p>
        </div>
        <div class="profile-about-footer">

                <a href="/abusereport/UserProfile?id=1&amp;redirectUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Fprofile" class="abuse-report-link">
                    <span class="text-error">Report Abuse</span>
                </a>


<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-past-usernames-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Past Usernames
                </h5>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div>
</div>
<div class="container-list profile-avatar">
    <h3>Currently Wearing</h3>
    <div class="col-sm-6 profile-avatar-left">


<div id="UserAvatar" class="thumbnail-holder" data-reset-enabled-every-page data-3d-thumbs-enabled data-url="/thumbnail/user-avatar?userId=1&amp;thumbnailFormatId=124&amp;width=300&amp;height=300" style="width:300px; height:300px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=1" data-js-files="https://js.rbxcdn.com/95518cef4aea4b89a95e61452d70c3bb.js"><img alt="ROBLOX" class="" src="https://web.archive.org/web/20160807101858/https://t5.rbxcdn.com/d32240edeabb4d87591d9cc9cf5dcb52"/></span>
        <img class="user-avatar-overlay-image thumbnail-overlay" src="https://images.rbxcdn.com/57ede1145c87db28cf51e2355909ee49.png" alt=""/>
    <span class="enable-three-dee btn-control btn-control-small"></span>
</div>


    </div>
        <div class="col-sm-6 profile-avatar-right">
            <div class="profile-avatar-mask">

<div class="profile-accoutrements-container" ng-controller="profileAccoutrementsController">
<div data-numberofaccoutrements="8" data-accoutrementsperpage="8" data-intouchscreen="false" profile-accoutrements-data profile-accoutrements-layout="profileAccoutrementsLayout" class="hidden"></div>
    <div id="accoutrements-slider" class="profile-accoutrements-slider" profile-accoutrements-slider profile-accoutrements-layout="profileAccoutrementsLayout">
                    <ul class="accoutrement-items-container">
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Man-Left-Arm-item?id=86500054">
                        <img title="Man Left Arm" alt="Man Left Arm" class="accoutrement-image" src="https://t1.rbxcdn.com/1eea2d0b26f722201e17dadde1a8c6d6"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Man-Right-Leg-item?id=86500078">
                        <img title="Man Right Leg" alt="Man Right Leg" class="accoutrement-image" src="https://t7.rbxcdn.com/7782c1f13f93ad4cf121454858d8499f"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Man-Right-Arm-item?id=86500036">
                        <img title="Man Right Arm" alt="Man Right Arm" class="accoutrement-image" src="https://t1.rbxcdn.com/6cd94102e9b74372a342a1dc42d28c31"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Man-Torso-item?id=86500008">
                        <img title="Man Torso" alt="Man Torso" class="accoutrement-image" src="https://t0.rbxcdn.com/609e49bede812c68122ba0648729a805"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Man-Left-Leg-item?id=86500064">
                        <img title="Man Left Leg" alt="Man Left Leg" class="accoutrement-image" src="https://t2.rbxcdn.com/8a5fc914ec02c7655a24b3a873e82b91"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/ROBLOX-Baseball-Cap-item?id=348212308">
                        <img title="ROBLOX Baseball Cap" alt="ROBLOX Baseball Cap" class="accoutrement-image" src="https://t7.rbxcdn.com/e16d6d2bad27c3a4cc140076744b71f8"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Black-Jacket-with-Blue-Shirt-item?id=358249985">
                        <img title="Black Jacket with Blue Shirt" alt="Black Jacket with Blue Shirt" class="accoutrement-image" src="https://t0.rbxcdn.com/a8d02410e8ad38d561bda7a4eab6e800"/>
                    </a>
                </li>
                <li class="accoutrement-item" ng-non-bindable>
                    <a href="/Jeans-with-Red-Kicks-item?id=358252359">
                        <img title="Jeans with Red Kicks" alt="Jeans with Red Kicks" class="accoutrement-image" src="https://t4.rbxcdn.com/b458eb0a27d93e72ce370741139e1938"/>
                    </a>
                </li>
                    </ul>

    </div><!--profile-accoutrement-slider-->
    <div id="accoutrements-page" class="profile-accoutrements-page-container" profile-accoutrements-page profile-accoutrements-layout="profileAccoutrementsLayout">
        <span class="profile-accoutrements-page hidden" ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 0}" ng-click="getAccoutrementsPage(0)"></span>
        <span class="profile-accoutrements-page hidden" ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 1}" ng-click="getAccoutrementsPage(1)"></span>
    </div>
</div>
            </div>
        </div>
</div>

    <div class="section profile-collections" ng-controller="profileCollectionsController">
        <div class="container-header">
            <h3>Collections</h3>
            <div class="collection-btns">
                            </div>
        </div>
        <div class="section-content">
                    <ul class="hlist collections-list item-list">
                    <li class="list-item asset-item collections-item">
                        <a href="/Seashell-Crown-item?id=472605748" class="collections-link" title="Seashell Crown">
                            <img src="https://t3.rbxcdn.com/ad8135b1242e147ed0f7999bf7b7ea6c" alt="Seashell Crown" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t3.rbxcdn.com/ad8135b1242e147ed0f7999bf7b7ea6c&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Seashell Crown</span>
                        </a>

                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="/Cool-Duck-Float-item?id=472507574" class="collections-link" title="Cool Duck Float">
                            <img src="https://t7.rbxcdn.com/dad5e181f1323c78ac204b1c8c15a67c" alt="Cool Duck Float" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t7.rbxcdn.com/dad5e181f1323c78ac204b1c8c15a67c&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Cool Duck Float</span>
                        </a>

                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="/Floppy-Pink-Bonnet-item?id=472606414" class="collections-link" title="Floppy Pink Bonnet">
                            <img src="https://t0.rbxcdn.com/a55792ad66bd6ce868eb0e98d59ed1e9" alt="Floppy Pink Bonnet" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/a55792ad66bd6ce868eb0e98d59ed1e9&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Floppy Pink Bonnet</span>
                        </a>

                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="/Pop-Shades-item?id=472606645" class="collections-link" title="Pop Shades">
                            <img src="https://t1.rbxcdn.com/5154e39cffea623f8a59ca1d9a81f98f" alt="Pop Shades" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t1.rbxcdn.com/5154e39cffea623f8a59ca1d9a81f98f&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Pop Shades</span>
                        </a>

                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="/Sandy-the-Shoreman-item?id=472606161" class="collections-link" title="Sandy the Shoreman">
                            <img src="https://t5.rbxcdn.com/bee9e6be9a6572faae8caa5b9f7a1480" alt="Sandy the Shoreman" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t5.rbxcdn.com/bee9e6be9a6572faae8caa5b9f7a1480&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Sandy the Shoreman</span>
                        </a>

                    </li>
                    <li class="list-item asset-item collections-item">
                        <a href="/Star-Shutter-Shades-item?id=472604853" class="collections-link" title="Star Shutter Shades">
                            <img src="https://t0.rbxcdn.com/7b36b700fee30f98663c9fe380008ff9" alt="Star Shutter Shades" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/7b36b700fee30f98663c9fe380008ff9&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                            <span class="text-overflow item-name">Star Shutter Shades</span>
                        </a>

                    </li>

        </ul>

        </div>
    </div>



    <div class="container-list" ng-controller="profileGridController" ng-init="init('group-list','group-container')">
    <div class="container-header">
        <h3>Groups</h3>
        <div ng-cloak class="container-buttons">
            <button class="profile-view-selector" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'btn-secondary-xs': !isGridOn, 'btn-control-xs': isGridOn}">
                <span class="icon-slideshow" ng-class="{'selected': !isGridOn}"></span>
            </button>
            <button class="profile-view-selector" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'btn-secondary-xs': isGridOn, 'btn-control-xs': !isGridOn}">
                <span class="icon-grid" ng-class="{'selected': isGridOn}"></span>
            </button>
        </div>
    </div>
    <div class="profile-slide-container">
            <div ng-show="isGridOn">
                <ul class="hlist game-cards group-list" style="max-height: {{containerHeight}}px" horizontal-scroll-bar="loadMore()">
                                <li class="list-item game-card group-container" data-index="0" ng-class="{'shown': 0 < visibleItems}">


<div>
    <a href="/groups/group.aspx?gid=7" class="card-item game-card-container">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb card-thumb" data-src="https://t5.rbxcdn.com/429652f9f057a5f78d3a2e1e315d204b" alt="Roblox"/>
        </div>
        <div class="text-overflow game-card-name" title="Roblox" ng-non-bindable>
            Roblox
        </div>
        <div class="text-overflow game-card-name-secondary">

            158K+ Members
        </div>
        <div class="text-overflow game-card-name-secondary" ng-non-bindable>
            Owner
        </div>
    </a>
</div>

                                </li>
                                <li class="list-item game-card group-container" data-index="1" ng-class="{'shown': 1 < visibleItems}">


<div>
    <a href="/groups/group.aspx?gid=127081" class="card-item game-card-container">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb card-thumb" data-src="https://t7.rbxcdn.com/c71faf11c893b989fdc2f42d3d1ba80e" alt="Roblox Wiki"/>
        </div>
        <div class="text-overflow game-card-name" title="Roblox Wiki" ng-non-bindable>
            Roblox Wiki
        </div>
        <div class="text-overflow game-card-name-secondary">

            14K+ Members
        </div>
        <div class="text-overflow game-card-name-secondary" ng-non-bindable>
            Wiki System Operator
        </div>
    </a>
</div>

                                </li>

                </ul>

                <a ng-cloak ng-click="loadMore()" class="btn btn-control-xs load-more-button" ng-show="2 > 6 * NumberOfVisibleRows">Load More</a>
            </div>

            <div id="groups-switcher" class="switcher slide-switcher groups" switcher itemscount="switcher.groups.itemsCount" currpage="switcher.groups.currPage" ng-hide="isGridOn">
                                <ul class="slide-items-container switcher-items hlist">
                    <li class="switcher-item slide-item-container active" ng-class="{'active': switcher.groups.currPage == 0}" data-index="0">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/groups/group.aspx?gid=7">
                                        <img class="slide-item-image" src="https://t3.rbxcdn.com/65d1038ec411a6bb13798ce55e0f2a5c" data-src="https://t0.rbxcdn.com/3597d7e6997a16570ebf3641fa2fa27b" data-emblem-id="365259670"/>


                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 text-overflow slide-item-container-right groups">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name groups" ng-non-bindable>Roblox</h2>
                                <p class="text-description para-overflow slide-item-description groups" ng-non-bindable>Official fan club of ROBLOX!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Members</div>
                                        <div class="text-lead slide-item-members-count">158K+</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Rank</div>
                                        <div class="text-lead text-overflow slide-item-my-rank groups" ng-non-bindable>Owner</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.groups.currPage == 1}" data-index="1">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/groups/group.aspx?gid=127081">
                                        <img class="slide-item-image" data-src="https://t6.rbxcdn.com/6a8c7ed1d6e449d83f75d4643713daf8" data-emblem-id="364871961"/>


                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 text-overflow slide-item-container-right groups">
                            <div class="slide-item-info">
                                <h2 class="slide-item-name groups" ng-non-bindable>Roblox Wiki</h2>
                                <p class="text-description para-overflow slide-item-description groups" ng-non-bindable>Roblox Wiki: http://wiki.roblox.com/ =================================
The official Roblox Wiki group.  The purpose of this group is:

1) Normal users to give the wiki staff ideas and suggestions.
2) The wiki staff to collaborate in a more organized and efficient manner.

Wiki applications are always open. The application can be found here: http://polls.roblox.com/roblox-wiki-writer-application

Please join if you are a wiki supporter and would like to share your ideas to the people actually who write the wiki.
</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Members</div>
                                        <div class="text-lead slide-item-members-count">14K+</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Rank</div>
                                        <div class="text-lead text-overflow slide-item-my-rank groups" ng-non-bindable>Wiki System Operator</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                        </ul>

                    <a class="carousel-control left" data-switch="prev"><span class="icon-carousel-left"></span></a>
                    <a class="carousel-control right" data-switch="next"><span class="icon-carousel-right"></span></a>

    </div>
</div>
</div>




    <div class="section" ng-controller="profileUtilitiesController">
                <div class="container-header">
                    <h3>Roblox Badges <span class="assets-count">(11)</span></h3>

                    <a ng-click="toggleContent(layoutContent.showMore)" class="btn-fixed-width btn-secondary-xs btn-more see-more-roblox-badges-button" ng-show="layoutContent.hasMoreContent" ng-cloak>See {{layoutContent.linkName}}</a>
                </div>


        <div class="section-content">
                    <ul class="hlist badge-list" truncate layout-content="layoutContent" ng-class="{'badge-list-more': !layoutContent.showMore}">
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge6" class="badge-link" title="Homestead">
                                <span class="icon-homestead" title="Homestead"></span>
                                <span class="text-overflow item-name">Homestead</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge7" class="badge-link" title="Bricksmith">
                                <span class="icon-bricksmith" title="Bricksmith"></span>
                                <span class="text-overflow item-name">Bricksmith</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge3" class="badge-link" title="Combat Initiation">
                                <span class="icon-combat-initiation" title="Combat Initiation"></span>
                                <span class="text-overflow item-name">Combat Initiation</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge12" class="badge-link" title="Veteran">
                                <span class="icon-veteran" title="Veteran"></span>
                                <span class="text-overflow item-name">Veteran</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge4" class="badge-link" title="Warrior">
                                <span class="icon-warrior" title="Warrior"></span>
                                <span class="text-overflow item-name">Warrior</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge2" class="badge-link" title="Friendship">
                                <span class="icon-friendship" title="Friendship"></span>
                                <span class="text-overflow item-name">Friendship</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge5" class="badge-link" title="Bloxxer">
                                <span class="icon-bloxxer" title="Bloxxer"></span>
                                <span class="text-overflow item-name">Bloxxer</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge8" class="badge-link" title="Inviter">
                                <span class="icon-inviter" title="Inviter"></span>
                                <span class="text-overflow item-name">Inviter</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge1" class="badge-link" title="Administrator">
                                <span class="icon-administrator" title="Administrator"></span>
                                <span class="text-overflow item-name">Administrator</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge18" class="badge-link" title="Welcome To The Club">
                                <span class="icon-welcome-to-the-club" title="Welcome To The Club"></span>
                                <span class="text-overflow item-name">Welcome To The Club</span>
                            </a>
                        </li>
                        <li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="/Badges.aspx#Badge16" class="badge-link" title="Outrageous Builders Club">
                                <span class="icon-outrageous-builders-club" title="Outrageous Builders Club"></span>
                                <span class="text-overflow item-name">Outrageous Builders Club</span>
                            </a>
                        </li>
                </ul>

        </div>
    </div>





<div class="section profile-statistics">
    <h3>Statistics</h3>

    <div class="section-content">
        <ul class="profile-stats-container">
            <li class="profile-stat">
                <p class="text-label">Join Date</p>
                <p class="text-lead">2/27/2006</p>
            </li>
            <li class="profile-stat">
                <p class="text-label">Place Visits</p>
                <p class="text-lead">29,906,429</p>
            </li>
            <li class="profile-stat">
                <p class="text-label">Forum Posts</p>
                <p class="text-lead">289</p>
            </li>
        </ul>
    </div>
</div>


            </div>
            <div class="tab-pane" id="creations">

    <div class="profile-game" ng-controller="profileGridController" ng-init="init('game-cards','game-container')">
        <div class="container-header">
            <h3 ng-non-bindable>Games</h3>
            <div class="container-buttons">
                <button class="profile-view-selector" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'btn-secondary-xs': !isGridOn, 'btn-control-xs': isGridOn}">
                    <span class="icon-slideshow" ng-class="{'selected': !isGridOn}"></span>
                </button>
                <button class="profile-view-selector" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'btn-secondary-xs': isGridOn, 'btn-control-xs': !isGridOn}">
                    <span class="icon-grid" ng-class="{'selected': isGridOn}"></span>
                </button>
            </div>
        </div>
        <div ng-show="isGridOn" class="game-grid">
            <ul class="hlist game-cards" style="max-height: {{containerHeight}}px" horizontal-scroll-bar="loadMore()">
                        <div class="game-container" data-index="0" ng-class="{'shown': 0 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=41324860&amp;Position=1&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t3.rbxcdn.com/f5f4cb1e3339fb4348c0bbe8c954ac1c" alt="Welcome to ROBLOX Building" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t3.rbxcdn.com/f5f4cb1e3339fb4348c0bbe8c954ac1c&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Welcome to ROBLOX Building" ng-non-bindable>
            Welcome to ROBLOX Building
        </div>
        <div class="game-card-name-secondary">
            50 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="14614" data-downvotes="3800" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">3,800</div>
                <div class="vote-up-count">14,614</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="1" ng-class="{'shown': 1 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=65033&amp;Position=2&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t0.rbxcdn.com/596a9d349350015ea850d2968552cd88" alt="Classic: Happy Home in Robloxia" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/596a9d349350015ea850d2968552cd88&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Happy Home in Robloxia" ng-non-bindable>
            Classic: Happy Home in Robloxia
        </div>
        <div class="game-card-name-secondary">
            0 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="846" data-downvotes="554" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">554</div>
                <div class="vote-up-count">846</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="2" ng-class="{'shown': 2 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=33913&amp;Position=3&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t5.rbxcdn.com/5134a9ea07f96466ee6237e0fa2cc986" alt="Classic: Glass Houses" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t5.rbxcdn.com/5134a9ea07f96466ee6237e0fa2cc986&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Glass Houses" ng-non-bindable>
            Classic: Glass Houses
        </div>
        <div class="game-card-name-secondary">
            0 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="687" data-downvotes="136" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">136</div>
                <div class="vote-up-count">687</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="3" ng-class="{'shown': 3 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=25415&amp;Position=4&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t0.rbxcdn.com/437f784bf0651c4cc618465d132bca34" alt="Classic: Rocket Arena" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/437f784bf0651c4cc618465d132bca34&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Rocket Arena" ng-non-bindable>
            Classic: Rocket Arena
        </div>
        <div class="game-card-name-secondary">
            0 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="581" data-downvotes="298" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">298</div>
                <div class="vote-up-count">581</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="4" ng-class="{'shown': 4 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=45778683&amp;Position=5&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t4.rbxcdn.com/78665cbbe3318f0e968d3144efc9646a" alt="Classic: Temple of the Ninja Masters!" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t4.rbxcdn.com/78665cbbe3318f0e968d3144efc9646a&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Temple of the Ninja Masters!" ng-non-bindable>
            Classic: Temple of the Ninja Masters!
        </div>
        <div class="game-card-name-secondary">
            0 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="581" data-downvotes="414" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">414</div>
                <div class="vote-up-count">581</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="5" ng-class="{'shown': 5 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=1818&amp;Position=6&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t1.rbxcdn.com/91d2e508a3a4849f53cd4a05223759b7" alt="Classic: Crossroads" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t1.rbxcdn.com/91d2e508a3a4849f53cd4a05223759b7&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Crossroads" ng-non-bindable>
            Classic: Crossroads
        </div>
        <div class="game-card-name-secondary">
            5 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="3105" data-downvotes="431" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">431</div>
                <div class="vote-up-count">3,105</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>
                        <div class="game-container" data-index="6" ng-class="{'shown': 6 < visibleItems}">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?PlaceId=14403&amp;Position=7&amp;PageType=Profile" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" data-src="https://t2.rbxcdn.com/e41d6325e23fa2cb097d57b01c074f4b" alt="Classic: Chaos Canyon" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t2.rbxcdn.com/e41d6325e23fa2cb097d57b01c074f4b&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Classic: Chaos Canyon" ng-non-bindable>
            Classic: Chaos Canyon
        </div>
        <div class="game-card-name-secondary">
            0 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="402" data-downvotes="191" data-voting-processed="false">
                    <div class="vote-background "></div>
                    <div class="vote-percentage"></div>
                    <div class="vote-mask">
                        <div class="segment seg-1"></div>
                        <div class="segment seg-2"></div>
                        <div class="segment seg-3"></div>
                        <div class="segment seg-4"></div>
                    </div>
                </div>
                <div class="vote-thumbs-down">
                    <span class="icon-thumbs-down"></span>
                </div>
            </div>
            <div class="vote-counts">
                <div class="vote-down-count">191</div>
                <div class="vote-up-count">402</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/1/profile">ROBLOX</a>
    </span>
    </div>
</li>


                        </div>

            </ul>

            <a ng-click="loadMore()" class="btn btn-control-xs load-more-button" ng-show="7 > 6 * NumberOfVisibleRows">Load More</a>
        </div>
        <div id="games-switcher" class="switcher slide-switcher games" ng-hide="isGridOn" switcher itemscount="switcher.games.itemsCount" currpage="switcher.games.currPage">
                        <ul class="slide-items-container switcher-items hlist">
                    <li class="switcher-item slide-item-container active" ng-class="{'active': switcher.games.currPage == 0}" data-index="0">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=41324860&amp;Position=1&amp;PageType=Profile">
                            <img class="slide-item-image" src="https://t3.rbxcdn.com/f5f4cb1e3339fb4348c0bbe8c954ac1c" data-src="https://t3.rbxcdn.com/f5f4cb1e3339fb4348c0bbe8c954ac1c" data-emblem-id="41324860" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t3.rbxcdn.com/f5f4cb1e3339fb4348c0bbe8c954ac1c&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Welcome to ROBLOX Building</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>What will you build?</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">50</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">22M+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 1}" data-index="1">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=65033&amp;Position=2&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t0.rbxcdn.com/596a9d349350015ea850d2968552cd88" data-emblem-id="65033" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/596a9d349350015ea850d2968552cd88&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Happy Home in Robloxia</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>A nice peaceful level with a starting house and a car. Hop in your car and explore the world! Insert furniture into your house! Start a garden! Add houses for friends! Grow your starting level into a huge city! Spice your game up with some hilarious weapons! A police station! A bank! A mountain lair for a criminal mastermind! Your imagination is the limit! Welcome to ROBLOX!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">0</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">341K+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 2}" data-index="2">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=33913&amp;Position=3&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t5.rbxcdn.com/5134a9ea07f96466ee6237e0fa2cc986" data-emblem-id="33913" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t5.rbxcdn.com/5134a9ea07f96466ee6237e0fa2cc986&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Glass Houses</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>Battle it out with friends in this classic destructible environment!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">0</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">352K+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 3}" data-index="3">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=25415&amp;Position=4&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t0.rbxcdn.com/437f784bf0651c4cc618465d132bca34" data-emblem-id="25415" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t0.rbxcdn.com/437f784bf0651c4cc618465d132bca34&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Rocket Arena</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>This map goes back to the basics: rockets, jetboots, and blowing up bridges. Out-maneuver your foes using your jetboots, cut off their escape by nuking the bridges, and rain doom down upon them using a rapid-fire rocket launcher. But don&#39;t fall in the lava - ouch!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">0</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">1M+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 4}" data-index="4">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=45778683&amp;Position=5&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t4.rbxcdn.com/78665cbbe3318f0e968d3144efc9646a" data-emblem-id="45778683" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t4.rbxcdn.com/78665cbbe3318f0e968d3144efc9646a&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Temple of the Ninja Masters!</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>Alone at the edge of the world sits a sacred temple, guarded by 4 powerful Ninja Masters, each given control of one of the elements.  Many brave and powerful warriors have attempted to plunder the treasures of this temple, but all who have attempted it have failed.  Until nao.  Can you and your crew of the world&#39;s most resourceful pirates stand against the might of the Ninja Masters?  Only time will tell.</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">0</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">500K+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 5}" data-index="5">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=1818&amp;Position=6&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t1.rbxcdn.com/91d2e508a3a4849f53cd4a05223759b7" data-emblem-id="1818" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t1.rbxcdn.com/91d2e508a3a4849f53cd4a05223759b7&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Crossroads</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>The classic ROBLOX level is back!</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">5</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">3M+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="switcher-item slide-item-container " ng-class="{'active': switcher.games.currPage == 6}" data-index="6">
                        <div class="col-sm-6 slide-item-container-left">
                            <div class="slide-item-emblem-container">
                                <a href="/games/refer?PlaceId=14403&amp;Position=7&amp;PageType=Profile">
                            <img class="slide-item-image" data-src="https://t2.rbxcdn.com/e41d6325e23fa2cb097d57b01c074f4b" data-emblem-id="14403" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;https://t2.rbxcdn.com/e41d6325e23fa2cb097d57b01c074f4b&quot;,&quot;RetryUrl&quot;:null}" image-retry/>

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 slide-item-container-right games">
                            <div class="slide-item-info">
                                <h2 class="text-overflow slide-item-name games" ng-non-bindable>Classic: Chaos Canyon</h2>
                                <p class="text-description para-overflow slide-item-description games" ng-non-bindable>Experience Chaos Canyon - Escape from Desolation Valley, explore the ruins on the cliffs, walk on the Sky Bridge and hold the Battle Cube from invaders! This map features models created by the community, including: PilotLuke, tingc222, and Yahoo.</p>
                            </div>
                            <div class="slide-item-stats">
                                <ul class="hlist">
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Playing</div>
                                        <div class="text-lead slide-item-members-count">0</div>
                                    </li>
                                    <li class="list-item">
                                        <div class="text-label slide-item-stat-title">Visits</div>
                                        <div class="text-lead text-overflow slide-item-my-rank games">960K+</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                        </ul>

                    <a class="carousel-control left" data-switch="prev"><span class="icon-carousel-left"></span></a>
                    <a class="carousel-control right" data-switch="next"><span class="icon-carousel-right"></span></a>

        </div>
    </div>






            </div>
        </div>
    </div>
</div>
<div>
    <div class="profile-ads-container">
        <div id="ProfilePageAdDiv1" class="profile-ad">


<iframe name="Roblox_Profile_Left_300x250" allowtransparency="true" frameborder="0" height="270" scrolling="no" src="/userads/3" width="300" data-js-adtype="iframead"></iframe>

        </div>
        <div id="ProfilePageAdDiv2" class="profile-ad">


<iframe name="Roblox_Profile_Right_300x250" allowtransparency="true" frameborder="0" height="270" scrolling="no" src="/userads/3" width="300" data-js-adtype="iframead"></iframe>

        </div>
    </div>
</div>


        </div>
            </div>

<?php pageBuilder::buildFooter(); ?>

</div>



    <script type="text/javascript">function urchinTracker() {}</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-game-launch-interface-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-user-logged-in="<?php echo json_encode($loggedIn); ?>" data-os-name="Windows" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress"/>
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
            <img src="https://images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R"/>
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24"/>
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
            <img src="https://images.rbxcdn.com/e060b59b57fdcc7874c820d13fdcee71.svg" width="90" height="90" alt="R"/>
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
            <img src="https://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application"/>
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
                Roblox.VideoPreRoll.videoLogNote = "Guest";
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
                <a href="/?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Fprofile"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="/newlogin?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fusers%2F1%2Fprofile">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

</script>

    <div id="InstallationInstructions" class="" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                    <span class="icon-close simplemodal-close"></span>
                    <h3 class="title">Thanks for playing ROBLOX</h3>
            </div>
            <div class="modal-content-container">
                <div class="ph-installinstructions-body ">


        <div class="ph-install-step ph-installinstructions-step1-of4">
            <h1>1</h1>
            <p class="larger-font-size">Click <strong>RobloxPlayer.exe</strong> to run the ROBLOX installer, which just downloaded via your web browser.</p>
            <img width="230" height="180" src="https://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step2-of4">
            <h1>2</h1>
            <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
            <img width="230" height="180" src="https://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step3-of4">
            <h1>3</h1>
            <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
            <img width="230" height="180" src="https://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step4-of4">
            <h1>4</h1>
            <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
            <div class="VisitButton VisitButtonContinueGLI">
                <a class="btn btn-primary-lg disabled">Play</a>
            </div>
        </div>

                </div>
            </div>
            <div class="xsmall">
                The ROBLOX installer should download shortly. If it doesn’t, start the <a href="#" class="text-link" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>


<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type="text/javascript" src="/js.rbxcdn.com/c55982be90aee588f799ba26ede12190.js"></script>

<script type="text/javascript">
    Roblox.Client._skip = null;
    Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
    Roblox.Client._installHost = 'setup.roblox.com';
    Roblox.Client.ImplementsProxy = true;
    Roblox.Client._silentModeEnabled = true;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = true;


        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }


        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  };
            Roblox.Client.ResumeTimer(eval(continuation));
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
                    <img class="loading-default" src="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="Processing..."/>
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



    <script type="text/javascript" src="/js.rbxcdn.com/cdbd7e966aa971b432a3e8411e18dd44.js"></script>



<script type="text/javascript" src="/js.rbxcdn.com/55204f6c51a6c3a803c608bf7bbd3285.js"></script>
                    <script type="text/javascript" src="/js.rbxcdn.com/822491cace41a2d39fd76db6cfd17800.js"></script>



    <script type="text/javascript">Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/c14a216bd7773e7b637b4e6c3c2e619d.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/4acfdab2e6131feb84d783765b82a888.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/6bac93e9bb6716f32f09db749cec330b.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8db82e6d725b907e91441b849cc35e47.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>


    <script>
        Roblox.XsrfToken.setToken('6os+xdGrRnuU');
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


    <script type="text/javascript" src="/js.rbxcdn.com/9d6d02965741039f4b6580ee5011daef.js"></script>




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
