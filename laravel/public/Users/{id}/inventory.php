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
    <!-- MachineID: WEB318 -->
    <title>Natural Disaster Survival - SCYTHE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation"/>
<meta name="description" content="Quickly, run around in circles! Your life depends on it!"/>
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine"/>
<meta name="apple-itunes-app" content="app-id=431946152"/>
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY"/>
    <meta property="og:site_name" content="ROBLOX"/>
    <meta property="og:title" content="Natural Disaster Survival"/>
    <meta property="og:type" content="game"/>
    <meta property="og:url" content="/games/189707/Natural-Disaster-Survival"/>
    <meta property="og:description" content="Quickly, run around in circles! Your life depends on it!"/>
    <meta property="og:image" content="/t1.rbxcdn.com/640804af4955fafb8d64c6f7a3514177"/>
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="Natural Disaster Survival">
    <meta name="twitter:description" content="Quickly, run around in circles! Your life depends on it!">
    <meta name="twitter:creator">
    <meta name="twitter:image1" content="http://t1.rbxcdn.com/640804af4955fafb8d64c6f7a3514177"/>
    <meta name="twitter:app:country" content="US">
    <meta name="twitter:app:name:iphone" content="ROBLOX Mobile">
    <meta name="twitter:app:id:iphone" content="431946152">
    <meta name="twitter:app:url:iphone" content="robloxmobile://placeID=189707">
    <meta name="twitter:app:name:ipad" content="ROBLOX Mobile">
    <meta name="twitter:app:id:ipad" content="431946152">
    <meta name="twitter:app:url:ipad" content="robloxmobile://placeID=189707">
    <meta name="twitter:app:name:googleplay" content="ROBLOX">
    <meta name="twitter:app:id:googleplay" content="com.roblox.client">
    <meta name="twitter:app:url:googleplay" content="robloxmobile://placeID=189707"/>


    <link href="/../../favicon.ico" rel="icon"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">

    <link rel="canonical" href="/games/189707/Natural-Disaster-Survival"/>


<link rel="stylesheet" href="/static.rbxcdn.com/css/leanbase___f6a967d8b0d72c29054dce1a3e6a7271_m.css/fetch"/>



<link rel="stylesheet" href="/static.rbxcdn.com/css/page___71b326dcb81e2f919d6c5c1c4dfc3238_m.css/fetch"/>




    <script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>



    <script type="text/javascript" src="/js.rbxcdn.com/772ab381c3064441d07dc1235c79872c.js"></script>




        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link href="/../../favicon.ico" rel="icon"/>

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


        <meta property="al:ios:url" content="robloxmobile://placeID=189707"/>
        <meta property="al:ios:app_store_id" content="431946152"/>
        <meta property="al:ios:app_name" content="Roblox Mobile"/>
        <meta property="al:web:should_fallback" content="false"/>




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
                _gaq.push(['b._setPageGroup', 1, 'GameDetail']);
    _gaq.push(['b._trackPageview']);


        _gaq.push(['c._setAccount', 'UA-26810151-2']);
            _gaq.push(['c._setDomainName', 'roblox.com']);
                    _gaq.push(['c._setPageGroup', 1, 'GameDetail']);

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
Roblox.Endpoints.Urls['/asset/'] = 'http://assetgame.roblox.com/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = '/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = '/client-status';
Roblox.Endpoints.Urls['/game/'] = 'http://assetgame.roblox.com/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'http://assetgame.roblox.com/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'http://assetgame.roblox.com/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'http://assetgame.roblox.com/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'http://assetgame.roblox.com/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'http://assetgame.roblox.com/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'http://assetgame.roblox.com/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'http://assetgame.roblox.com/game/updateprerollcount';
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
Roblox.Endpoints.Urls['/catalog/json'] = 'http://search.roblox.com/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.roblox.com/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.roblox.com/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'http://assetgame.roblox.com/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'http://assetgame.roblox.com/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'http://assetgame.roblox.com/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'http://assetgame.roblox.com/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'http://assetgame.roblox.com/asset/request-thumbnail-fix';
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
<body id="rbx-body" class="" data-performance-relative-value="0.5" data-internal-page-name="GameDetail" data-send-event-percentage="0.01">
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


<iframe name="Roblox_GameDetail_Top_728x90" allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>

                </div>

<div id="game-detail-page" class="row page-content">
    <div class="col-xs-12 section-content game-main-content">
        <div class="game-thumb-container">
            <script>
    var Roblox = Roblox || {};
    Roblox.Carousel = function () {
        var carouselId = "#carousel-game-details";
        var checkedForVideo = false;
        var isMobile = false;

        var initialize = function () {
            // acquire isMobile setting from DOM
            isMobile = $(carouselId).data('is-mobile');

            // set up carousel
            if(!isMobile) {
                $(carouselId).carousel({
                    interval: 6000,
                    pause: "hover"
                });
            } else {
                // do not cycle automatically on mobile because user might be playing video
                $(carouselId).carousel({
                    interval: false,
                    pause: "hover"
                });
            }


            // bindings
            $(carouselId)
                .on("slide.bs.carousel", function () {
                    // pause ALL the videos
                    Roblox.Carousel.pauseAllVideos();
                    // restart the carousel sliding
                    $(carouselId).carousel('cycle');
                })
                .hover(
                    function () {
                        $(this).addClass("hover");
                    },
                    function () {
                        $(this).removeClass("hover");
                    }
                );

            // hide controls when there's only one slide
            if ($(carouselId + " .item").length < 2) {
                $(carouselId).find(".carousel-control").css("display", "none");
            }

            $(document).on("playButton:gamePlayIntent", function () {
                // we pressed the play button - stop playing the video
                Roblox.Carousel.pauseAllVideos();
            });

            Roblox.Carousel.setUpYouTubeAPI();

            // retry thumbnails in carousel
            $(function () {
                $(carouselId + " .item span").loadRobloxThumbnails();
            });
        }

        var setUpYouTubeAPI = function () {
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


        }

        var toggleVideo = function (state) {
            var div = $('.flex-video');
            if(div.length > 0){
                var iframe = div.find('iframe')[0].contentWindow;
                var func = state == 'hide' ? 'pauseVideo' : 'playVideo';
                iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
            }
        }

        var pauseVideoAtIndex = function (idx) {
            if (rbxplayer && rbxplayer.length > 0 && !isMobile) {
                try {
                    rbxplayer[idx].pauseVideo();
                } catch (e) {
                    // tried to pause before player was ready
                }

            } else {
                return false;
            }
        }

        var playVideoAtIndex = function (idx) {
            if(rbxplayer && rbxplayer.length > 0 && rbxplayer[idx] && !isMobile) {
                rbxplayer[idx].playVideo();
                return true;
            } else {
                return false;
            }
        }

        var pauseAllVideos = function () {
            // pause ALL the videos
            if (rbxplayer && rbxplayer.length > 0) {
                var rbxplayerlen = rbxplayer.length;
                for (var i = 0; i < rbxplayerlen; i++) {
                    Roblox.Carousel.pauseVideoAtIndex(i);
                }
            }
        }

        var checkForVideo = function () {
            if(checkedForVideo) {
                return false;
            }
            var carousel = $(carouselId);
            carousel.find('.item').each(function (idx, val) {
                if ($(val).find('.flex-video').length > 0) {
                    carousel.carousel(idx);
                    carousel.carousel("pause");
                    var successfulPlay = Roblox.Carousel.playVideoAtIndex(0);
                    checkedForVideo = successfulPlay;
                    return false; // stop
                } else {
                    return true; // keep going
                }
            });
        }
        var onPlayerReady = function () {
            // This first moment get the video and auto-play it
            var autoplay = $(carouselId).data('is-video-autoplayed-on-ready');
            if (autoplay && !isMobile) {
                Roblox.Carousel.checkForVideo();
            }
        }
        var onPlayerPlaying = function () {
            // We are playing the video. Stop the carousel.
            var carousel = $(carouselId);
            carousel.carousel("pause");
        }


        return {
            initialize: initialize,
            toggleVideo: toggleVideo,
            checkForVideo: checkForVideo,
            setUpYouTubeAPI: setUpYouTubeAPI,
            onPlayerReady: onPlayerReady,
            onPlayerPlaying: onPlayerPlaying,
            pauseVideoAtIndex: pauseVideoAtIndex,
            playVideoAtIndex: playVideoAtIndex,
            pauseAllVideos: pauseAllVideos
        }

    }();

    // For YouTube API. Must be global.

    var rbxplayer = [];
    function onYouTubeIframeAPIReady() {
        var carouselId = "#carousel-game-details";
        $(carouselId).find(".flex-video").each(function (idx, el) {
            youTubeId = $(el).find("iframe").attr("id");
            rbxplayer[rbxplayer.length] = new YT.Player(youTubeId, {});
        });

        // listen for postMessage from YouTube
        $(window).on("message", function (e) {
            var originalData = e.originalEvent.data;

            // data is not JSON
            if (originalData.charAt(0) != "{") {
                return ;
            }
            var data = $.parseJSON(originalData);

            if (data.event == "onReady") {
                Roblox.Carousel.onPlayerReady();
            }
            if(data.event == "infoDelivery" && data.info.playerState && data.info.playerState == 1) {
                Roblox.Carousel.onPlayerPlaying();
            }
        });
    }


    $(document).ready(function () {
        Roblox.Carousel.initialize();
    });
</script>



<div id="carousel-game-details" class="carousel slide" data-ride="carousel" data-is-video-autoplayed-on-ready="true" data-is-mobile="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">


            <div class="item active">
<span><img class="carousel-thumb" src="/t6.rbxcdn.com/bad0ed3fedd9d3281669ca20d853a1c2"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t1.rbxcdn.com/8abfd5bd76d3d2a3a8c9422b97c756c9"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t1.rbxcdn.com/89cab5b8ef3b2fdee60ebaec5cb887b5"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t1.rbxcdn.com/70f1a38808baec1bf1babd8a5020ba63"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t2.rbxcdn.com/27f97a09be1b65f19847be62b0f04c1c"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t0.rbxcdn.com/5a974eb69c4ce2824bcc53cdf4f82c64"/></span>            </div>
            <div class="item ">
<span><img class="carousel-thumb" src="/t1.rbxcdn.com/5174bdd34411e9210ab6342ec84dfb4a"/></span>            </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-game-details" role="button" data-slide="prev">
        <span class="icon-carousel-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-game-details" role="button" data-slide="next">
        <span class="icon-carousel-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


        </div>
        <div class="game-calls-to-action">

            <div class="game-title-container">
                <h2 class="game-name" title="Natural Disaster Survival">Natural Disaster Survival</h2>
                <div class="game-creator"><span class="text-label">By</span> <a class="text-name" href="/users/80254/profile">Stickmasterluke</a></div>
            </div>
            <div class="game-play-buttons" data-autoplay="false">



                            <div id="MultiplayerVisitButton" class="VisitButton VisitButtonPlay" placeid="189707" data-action="play" data-is-membership-level-ok="true">
                                <a class="btn-primary-lg">Play</a>
                            </div>



<script type="text/javascript">
    Roblox = Roblox || {};

    Roblox.BCUpsellModal = function () {
        var resources = {
            //<sl:translate>
            title: "Builders Club Only",
            body: "This is a premium feature only available to our Builders Club members.",
            accept: "Upgrade Now"
            //</sl:translate>
        };

        var open = function () {
            var options = {
                titleText: Roblox.BCUpsellModal.Resources.title,
                bodyContent: Roblox.BCUpsellModal.Resources.body,
                footerText: "",
                acceptText: Roblox.BCUpsellModal.Resources.accept,
                declineText: Roblox.Resources.GenericConfirmation.No,
                acceptColor: Roblox.GenericConfirmation.green,
                onAccept: function () { window.location.href = '/premium/membership?ctx=bc-only-game'; },
                imageUrl: 'http://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png'
            };

            Roblox.GenericConfirmation.open(
                options
            );
        };

        return {
            open: open,
            Resources:resources
        };
    } ();
</script>
<script type="text/javascript">
    var play_placeId = 189707;
    function fireEventAction(action) {
        RobloxEventManager.triggerEvent('rbx_evt_popup_action', { action: action });
    }

    $(function () {

        $('.VisitButtonPlay').click(function () {
            play_placeId = $(this).attr('placeid');
            Roblox.CharacterSelect.placeid = play_placeId;
            Roblox.CharacterSelect.show();
        });

        $('#game-context-menu').on('click touchstart', '.VisitButtonBuild', function () {
            RobloxLaunch._GoogleAnalyticsCallback = function () {
                var isInsideRobloxIDE = 'website';

                if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                    isInsideRobloxIDE = 'Studio';
                }

                GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Build']);
                EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin');

                if (typeof Roblox.GamePlayEvents != 'undefined') {
                    Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                }
            };

            play_placeId =
                (typeof $(this).attr('placeid') === 'undefined')
                    ? play_placeId
                    : $(this).attr('placeid');

            Roblox.Client.WaitForRoblox(function () {
                window.location =
                    '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fgames%2f189707%2fNatural-Disaster-Survival';
            });

            return false;
        });

        $('#game-context-menu').on('click touchstart', '.VisitButtonEdit', function () {
            RobloxLaunch._GoogleAnalyticsCallback = function () {
                var isInsideRobloxIDE = 'website';

                if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                    isInsideRobloxIDE = 'Studio';
                }

                GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Edit']);
                EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin');

                if (typeof Roblox.GamePlayEvents != 'undefined') {
                    Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                }
            };

            play_placeId =
                (typeof $(this).attr('placeid') === 'undefined')
                    ? play_placeId
                    : $(this).attr('placeid');

            Roblox.Client.WaitForRoblox(function () {
                RobloxLaunch.StartGame(
                    'http://assetgame.roblox.com/Game/edit.ashx?PlaceID=' + play_placeId + '&upload=',
                    'edit.ashx',
                    '/Login/Negotiate.ashx',
                    'FETCH',
                    true
                );
            });

            return false;
        });

        $(document).on('CharacterSelectLaunch', function (event, genderTypeID) {

            var isInsideRobloxIDE = 'website';

            if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                isInsideRobloxIDE = 'Studio';
            }

            GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
            EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin');

            if (typeof Roblox.GamePlayEvents != 'undefined') {
                Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
            }

            play_placeId =
                (typeof $(this).attr('placeid') === 'undefined')
                    ? play_placeId
                    : $(this).attr('placeid');

            Roblox.Client.WaitForRoblox(function () {
                RobloxLaunch.RequestGame(
                    'PlaceLauncherStatusPanel',
                    play_placeId,
                    genderTypeID
                );
            });

            return false;
        });

    }());

</script>
<script type="text/javascript">
    $(function() {
        Roblox.PlaceItemPurchase = new Roblox.ItemPurchase(function (obj) {
            $(".PurchaseButton[data-item-id="+ obj.AssetID +"]").each(function (index, htmlElem) {
                $("#rbx-place-purchase-required").hide();
                $("#MultiplayerVisitButton").show();
            });
        });

        if("False".toLowerCase() == "true") {
            $(function () {
                $("#rbx-place-purchase-required").on("click", function(e) {
                    Roblox.PlaceItemPurchase.openPurchaseVerificationView(this);
                    return false;
                });
            });
        }
    });
</script>
            </div>


            <ul class="share-rate-favorite">


        <li class="favorite-button-container tooltip-container" data-toggle="tooltip" title="" data-original-title="Add to Favorites">
            <a>

                <div class="icon-favorite " data-toggle-url="/favorite/toggle" data-assetid="189707" data-isguest="True" data-signin-url="/newlogin?returnUrl=%2Fgames%2F189707%2FNatural-Disaster-Survival">

                    <span title="761,567" class="text-favorite favoriteCount 761,567" id="result">761K+</span>
                </div>
            </a>
        </li>


        <li class="voting-panel body" data-asset-id="189707" data-total-up-votes="269380" data-total-down-votes="21145" data-vote-modal="" data-user-authenticated="<?php echo json_encode($loggedIn); ?>">
            <div class="loading"></div>
                <div class="vote-summary">
                    <div class="voting-details">
                        <div class="users-vote ">
                            <div class="upvote">
                                <span class="icon-like "></span>
                                <span id="vote-up-text" title="269380" class="vote-text">269K+</span>
                            </div>
                            <div class="downvote">
                                <span id="vote-down-text" title="21145" class="vote-text">21K+</span>
                                <span class="icon-dislike "></span>

                            </div>
                        </div>
                    </div>
                    <div class="visual-container">
                        <div class="background"></div>
                        <div class="percent"></div>
                    </div>
                </div>
        </li>




<script>
    $(function () {
        Roblox.Voting.Initialize();

        Roblox.Voting.Resources = {
            //<sl:translate>
            emailVerifiedTitle: "Verify Your Email",
            emailVerifiedMessage: "You must verify your email before you can vote. You can verify your email on the <a href='/my/account?confirmemail=1'>Account</a> page.",

            playGameTitle: "Play Game",
            playGameMessage: "You must play the game before you can vote on it.",

            useModelTitle: "Use Model",
            useModelMessage: "You must use this model before you can vote on it.",

            installPluginTitle: "Install Plugin",
            installPluginMessage: "You must install this plugin before you can vote on it.",

            buyGamePassTitle: "Buy Game Pass",
            buyGamePassMessage: "You must own this game pass before you can vote on it.",

            floodCheckThresholdMetTitle: "Slow Down",
            floodCheckThresholdMetMessage: "You're voting too quickly. Come back later and try again.",

            unknownProblemTitle: "Something Broke",
            unknownProblemMessage: "There was an unknown problem voting. Please try again.",

            guestUserTitle: "Login to Vote",
            guestUserMessage: "<div>You must login to vote.</div> <div>Please <a href='/newlogin?returnUrl=%2Fgames%2F189707%2FNatural-Disaster-Survival'>login or register</a> to continue.</div>",
            returnUrl: '/newlogin?returnUrl=%2Fgames%2F189707%2FNatural-Disaster-Survival',

            accountUnderOneDayTitle: "Voter Feedback",
            accountUnderOneDayMessage: "You will be able to vote on Games and Studio Models later, after you've had a chance to experience ROBLOX a bit more. Come back to this page in a couple days.",

            accept: "Verify",
            decline: "Cancel",
            login: "Login"
            //<sl:translate>
        };
    });
</script>


                <li class="social-media-share">

                </li><!-- .social-media-share -->
            </ul><!-- .share-rate-favorite-->
        </div>
    </div>

    <div class="col-xs-12 rbx-tabs-horizontal" data-place-id="189707">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li id="tab-about" class="rbx-tab tab-about active">
                <a class="rbx-tab-heading" href="#about">
                    <span class="text-lead">About</span>
                </a>
            </li>
            <li id="tab-store" class="rbx-tab tab-store">
                <a class="rbx-tab-heading" href="#store">
                    <span class="text-lead">Store</span>
                </a>
            </li>
                <li id="tab-leaderboards" class="rbx-tab tab-leaderboards">
                    <a class="rbx-tab-heading" href="#leaderboards">
                        <span class="text-lead">Leaderboards</span>
                    </a>
                </li>

            <li id="tab-game-instances" class="rbx-tab tab-game-instances">
                <a class="rbx-tab-heading" href="#game-instances">
                    <span class="text-lead">Servers</span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section game-about-container">
                    <h3>Description</h3>
                    <div class="section-content">
                        <p class="game-description linkify">Quickly, run around in circles! Your life depends on it!</p>

                        <ul class="game-stats-container">
                            <li class="game-stat">
                                <p class="text-label">Visits</p>
                                <p class="text-lead" title="109,638,996">109M+</p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Created</p>
                                <p class="text-lead">3/29/2008</p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Updated</p>
                                <p class="text-lead">7/15/2016</p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Max Players</p>
                                <p class="text-lead">32</p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Genre</p>
                                    <p class="text-lead">
                                        <a class="text-name" href="/games?GenreFilter=1">All</a>
                                    </p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Allowed Gear types</p>
                                <p class="text-lead stat-gears">
        <span class="icon-nogear" data-toggle="tooltip" data-original-title="No Gear Allowed"></span>


                                </p>
                            </li>
                        </ul>
                        <div class="game-stat-footer">
                                    <span class="text-pastname game-copylocked-footnote">This game is copylocked</span>

                            <span class="game-report-abuse"><a class="text-report" href="/abusereport/asset?id=189707&amp;RedirectUrl=%2fgames%2f189707%2fNatural-Disaster-Survival">Report Abuse</a></span>
                        </div>
                    </div>
                </div>


    <div id="rbx-vip-servers" class="container-list" data-placeid="189707" data-universeid="65241" data-showshutdown data-slow-game-fps-threshold="15" data-private-server-name-max-length="50" data-private-server-name-error-text="The name of a VIP Server cannot be blank and can be no more than {0} characters." data-configure-base-url="/private-server/configure?privateServerId={0}" data-game-instances-base-url="/private-server/instance-list?universeId=65241" data-game-shutdown-url="/game-instances/shutdown" data-is-user-authenticated="<?php echo json_encode($loggedIn); ?>" data-instance-list-url="/private-server/instance-list-json" data-renew-url="/private-server/renew" data-avatar-headshot-enabled="true">

        <div class="container-header">
            <h3>VIP Servers</h3>
            <span class="tooltip-container" data-toggle="tooltip" data-original-title="VIP servers let you play this game privately with friends, your clan, or people you invite!">
                <span class="icon-moreinfo"></span>
            </span>
        </div>

        <div class="section-content create-server-banner">
                <div id="private-server-purchase-body-content" class="hidden">
                    <div class="private-server-purchase">
                        <div class="modal-list-item private-server-main-text">
                            Create a VIP Server for {0}?
                        </div>
                        <div class="modal-list-item">
                            <span class="text-label private-server-game-name">
                                Game Name
                            </span>
                            <span class="game-name">
                                Natural Disaster Survival
                            </span>
                        </div>
                        <div class="modal-list-item private-server-name-input">
                            <span class="text-label">Server Name</span>
                            <div class="form-group">
                                <input type="text" class="form-control input-field private-server-name" maxlength="50">
                            </div>
                            <div class="form-control-label private-server-name-error-message"></div>
                        </div>
                    </div>
                </div>
                <span class="btn-secondary-md btn-more rbx-vip-server-create" data-is-private-server="true" data-product-id="23083886" data-item-id="189707" data-item-name="Natural Disaster Survival" data-expected-price="300" data-expected-currency="1" data-seller-name="Stickmasterluke" data-expected-seller-id="80254" data-continueshopping-url="/games/189707/Natural-Disaster-Survival" data-purchase-title-text="Create VIP Server" data-purchase-body-content="" data-purchase-url="/private-server/purchase" data-universe-id="65241" data-modal-field-validation-required="true" data-footer-text="Your balance after this transaction will be <span class='icon-robux-gray-16x16'></span>{0}. This is a subscription-based feature. It will auto-renew once a month until you cancel the subscription." name="CreatePrivateServer">Create VIP Server</span>
                            <span class="create-server-banner-text">Play this game with friends and other people you invite.<br/>See all your VIP servers in the <a class="text-link" href="#!/game-instances">Servers</a> tab.</span>

        </div>
        <div class="section tab-server-only">

        </div>
    </div>

<script>
    var Roblox = Roblox || {};

    Roblox.PrivateServers = Roblox.PrivateServers || {};
    //<sl:translate>
    Roblox.PrivateServers.RenewRecurringTitle = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringBody = "Are you sure you want to enable future payments for your private VIP version of "
    + "Natural Disaster Survival by Stickmasterluke?<br><br>This VIP Server will start renewing every month at "
    + "<span class=\"icon-robux-16x16\"></span><span class=\"text-robux\">300</span> until you cancel.";
    Roblox.PrivateServers.RenewRecurringAcceptText = "Renew";
    Roblox.PrivateServers.RenewRecurringDeclineText = "Cancel";
    Roblox.PrivateServers.UserProfileAbsoluteUrlPattern = "/users/0/profile";
    //<sl:translate>
</script>



    <div class="container-list badge-container">
        <div class="container-header">
            <h3>Game Badges</h3>
        </div>
        <ul class="badge-list">
                <li class="section-row badge-row ">
                    <div class="badge-image">
                        <a href="/Survived-a-Disaster-item?id=66918518"><img src="/t0.rbxcdn.com/883aac4d965398ab718f92675c0bac3c" alt="Survived a Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived a Disaster</div>
                            <p class="para-overflow">
                                Congratulations. Unfortunately, one is not enough.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">43.8% (Moderate)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">48798</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">12961673</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row ">
                    <div class="badge-image">
                        <a href="/Survived-10-Disasters-item?id=66918551"><img src="/t4.rbxcdn.com/ab1009b9359385b23d1d42e45b21d10f" alt="Survived 10 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 10 Disasters</div>
                            <p class="para-overflow">
                                Nice job, keep going!
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">18.6% (Hard)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">20733</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">4839014</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row ">
                    <div class="badge-image">
                        <a href="/Survived-25-Disasters-item?id=66918611"><img src="/t5.rbxcdn.com/a5d134fc81326f4e7d4ca85770210f05" alt="Survived 25 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 25 Disasters</div>
                            <p class="para-overflow">
                                That is a good amount. You live to die another day.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">9.0% (Extreme)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">10038</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">2351036</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survived-50-Disasters-item?id=66918640"><img src="/t5.rbxcdn.com/81aabde18a8bef2b9517296b143838c2" alt="Survived 50 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 50 Disasters</div>
                            <p class="para-overflow">
                                Jeeze. Not many people can say they have done the same.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">4.3% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">4750</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">1146736</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survived-100-Disasters-item?id=66918685"><img src="/t1.rbxcdn.com/bdbf049f0048ae7beb2b46c35056b946" alt="Survived 100 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 100 Disasters</div>
                            <p class="para-overflow">
                                This is definitely a feat worth boasting about.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">1.5% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">1650</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">450552</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survived-200-Disasters-item?id=66918716"><img src="/t1.rbxcdn.com/536bf22130ebee24852127401691b9ca" alt="Survived 200 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 200 Disasters</div>
                            <p class="para-overflow">
                                This badge is only for the most unstoppable players. Anyone with this badge is far beyond expert. I congratulate the few who actually achieve this badge.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.4% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">407</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">131617</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survived-400-Disasters-item?id=66918795"><img src="/t6.rbxcdn.com/dd86ab07879125112ebdb540e336f1e0" alt="Survived 400 Disasters"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survived 400 Disasters</div>
                            <p class="para-overflow">
                                Okay. You won. What more do you want from me? Seriously, 400 times? You people are insane. Again... Nice job to the few who venture this far, to endure the torment of disaster after disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.1% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">74</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">30640</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Chance-item?id=66918848"><img src="/t0.rbxcdn.com/cfd51705a12959112dc716f4b1266540" alt="Chance"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Chance</div>
                            <p class="para-overflow">
                                Struck by the last bolt of lightning. What are the chances?
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.4% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">459</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">173684</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/High-Survive-Five-item?id=66918916"><img src="/t4.rbxcdn.com/561470996e878256c67240b02d9d60ae" alt="High Survive Five!"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">High Survive Five!</div>
                            <p class="para-overflow">
                                Survive five rounds in a row.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">6.8% (Extreme)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">7548</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">2163026</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Surfs-Up-item?id=66918948"><img src="/t5.rbxcdn.com/35a5eb0412e1b76933d6284440e48223" alt="Surf's Up!"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Surf&#39;s Up!</div>
                            <p class="para-overflow">
                                Survive a tsunami on the map Surf Central.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">5.5% (Extreme)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">6080</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">1848143</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Barn-Fire-item?id=66918988"><img src="/t1.rbxcdn.com/dd73c5c813ba80db7fcdefee56053800" alt="Barn Fire"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Barn Fire</div>
                            <p class="para-overflow">
                                What&#39;s that Lassie? The barn is on fire?!?!
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">4.3% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">4756</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">1338966</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Close-Call-item?id=66919023"><img src="/t0.rbxcdn.com/eab1eaf1735b2fd41b9459f52b7a61a5" alt="Close Call"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Close Call</div>
                            <p class="para-overflow">
                                Survive a disaster with 10hp or less.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">18.2% (Hard)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">20238</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">3681711</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/House-Flood-item?id=66919105"><img src="/t6.rbxcdn.com/d128dc8be33d46048c9e7f59678e65b3" alt="House Flood"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">House Flood</div>
                            <p class="para-overflow">
                                Survive a flood at your happy home.

Any clever comments on a house being flooded?

Caution: floor slippery when wet.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">2.8% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">3125</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">612621</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/GET-TO-THE-CHOPPA-item?id=66919155"><img src="/t6.rbxcdn.com/c487ec530e28e2203349dc513d190de3" alt="GET TO THE CHOPPA!"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">GET TO THE CHOPPA!</div>
                            <p class="para-overflow">
                                Get to the choppa.. and survive a thunderstorm.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">3.6% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">4052</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">1160654</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Tornado-vs-Trailer-Park-item?id=66956295"><img src="/t6.rbxcdn.com/2d6f0bf36ca765371ee0389e5bb2b135" alt="Tornado vs. Trailer Park"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Tornado vs. Trailer Park</div>
                            <p class="para-overflow">
                                Survive it.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">3.8% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">4267</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">1212690</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-2-Multi-Disaster-item?id=454956782"><img src="/t0.rbxcdn.com/33e2191ae10827ae52e734f4f137cc97" alt="Survive Power 2 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 2 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 2 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">3.0% (Insane)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">3337</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">54613</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-3-Multi-Disaster-item?id=454956889"><img src="/t4.rbxcdn.com/8f49ba254e24f341def4babcb870c82f" alt="Survive Power 3 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 3 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 3 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.7% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">761</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">8343</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-4-Multi-Disaster-item?id=454957071"><img src="/t1.rbxcdn.com/73dcdef6c45a2a9397197fa8a2a1661b" alt="Survive Power 4 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 4 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 4 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.1% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">147</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">2185</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-5-Multi-Disaster-item?id=454957253"><img src="/t5.rbxcdn.com/f7f0e8dce00cc4f578f526d457fc4565" alt="Survive Power 5 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 5 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 5 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.0% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">53</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">841</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-6-Multi-Disaster-item?id=454957314"><img src="/t3.rbxcdn.com/5673b4d657a6a15a08e91847afe8d8a7" alt="Survive Power 6 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 6 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 6 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.0% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">25</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">311</div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="section-row badge-row badge-see-more-row">
                    <div class="badge-image">
                        <a href="/Survive-Power-7-Multi-Disaster-item?id=454957377"><img src="/t1.rbxcdn.com/766227d0e47b295b59c22600a9f5427a" alt="Survive Power 7 Multi-Disaster"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">Survive Power 7 Multi-Disaster</div>
                            <p class="para-overflow">
                                Survive a power 7 Multi-Disaster.
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">0.0% (Impossible)</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">35</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">589</div>
                            </li>
                        </ul>
                    </div>
                </li>

            <li>
                <button type="button" class="btn-full-width btn-control-sm" id="badges-see-more">See More</button>

            </li>
        </ul>

    </div>


                    <div id="my-recommended-games" class="container-list games-detail">
                        <div class="container-header">
                            <h3>Recommended Games</h3>
                        </div>



<ul class="hlist game-cards game-cards-sm">


<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=180714690&amp;Position=1&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t4.rbxcdn.com/ce3a4ca4ca2743c32a2a4ed22d67218f" alt="(NEW WEAPONS!) Giant Survival!" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t4.rbxcdn.com/ce3a4ca4ca2743c32a2a4ed22d67218f&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="(NEW WEAPONS!) Giant Survival!" ng-non-bindable>
            (NEW WEAPONS!) Giant Survival!
        </div>
        <div class="game-card-name-secondary">
            988 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="119932" data-downvotes="14568" data-voting-processed="false">
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
                <div class="vote-down-count">14,568</div>
                <div class="vote-up-count">119,932</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/19717956/profile">BuildIntoGames</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=30869879&amp;Position=2&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t6.rbxcdn.com/14852250013a7e0868d3f6247b106275" alt="Stop it, Slender! 2" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t6.rbxcdn.com/14852250013a7e0868d3f6247b106275&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Stop it, Slender! 2" ng-non-bindable>
            Stop it, Slender! 2
        </div>
        <div class="game-card-name-secondary">
            706 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="140192" data-downvotes="14626" data-voting-processed="false">
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
                <div class="vote-down-count">14,626</div>
                <div class="vote-up-count">140,192</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/6686423/profile">Kinnis97</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=70005410&amp;Position=3&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t0.rbxcdn.com/5c9391171d427ab0d72a6f601955f569" alt="Blox Hunt | v2.3.12" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t0.rbxcdn.com/5c9391171d427ab0d72a6f601955f569&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Blox Hunt | v2.3.12" ng-non-bindable>
            Blox Hunt | v2.3.12
        </div>
        <div class="game-card-name-secondary">
            2,046 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="117291" data-downvotes="15117" data-voting-processed="false">
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
                <div class="vote-down-count">15,117</div>
                <div class="vote-up-count">117,291</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/3967548/profile">Lion2323</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=178704642&amp;Position=4&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t3.rbxcdn.com/00604135202357e98da33dd616c044ef" alt="Ripull Minigames" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t3.rbxcdn.com/00604135202357e98da33dd616c044ef&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Ripull Minigames" ng-non-bindable>
            Ripull Minigames
        </div>
        <div class="game-card-name-secondary">
            1,783 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="123702" data-downvotes="16824" data-voting-processed="false">
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
                <div class="vote-down-count">16,824</div>
                <div class="vote-up-count">123,702</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/695213/profile">Ripull</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=230362888&amp;Position=5&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t4.rbxcdn.com/e000e13a8907e90194216fa833ee7ba8" alt="The Normal Elevator" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t4.rbxcdn.com/e000e13a8907e90194216fa833ee7ba8&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="The Normal Elevator" ng-non-bindable>
            The Normal Elevator
        </div>
        <div class="game-card-name-secondary">
            2,157 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="121265" data-downvotes="11259" data-voting-processed="false">
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
                <div class="vote-down-count">11,259</div>
                <div class="vote-up-count">121,265</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/38506985/profile">NowDoTheHarlemShake</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=222415472&amp;Position=6&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t4.rbxcdn.com/fcb6b6532768c961d98c2b62bd2d4e14" alt="ROBLOX DODGEBALL!" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t4.rbxcdn.com/fcb6b6532768c961d98c2b62bd2d4e14&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="ROBLOX DODGEBALL!" ng-non-bindable>
            ROBLOX DODGEBALL!
        </div>
        <div class="game-card-name-secondary">
            443 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="99484" data-downvotes="15034" data-voting-processed="false">
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
                <div class="vote-down-count">15,034</div>
                <div class="vote-up-count">99,484</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/123247/profile">alexnewtron</a>
    </span>
    </div>
</li>



<li class="list-item game-card">
    <div class="game-card-container">
    <a href="/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=189707&amp;PlaceId=314906000&amp;Position=7&amp;PageType=GameDetail" class="game-card-link">
        <div class="game-card-thumb-container">
            <img class="game-card-thumb" src="/t1.rbxcdn.com/253d2dbc148a6d7cb7549e10b3d67c6c" alt="Hide and Seek Extreme" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t1.rbxcdn.com/253d2dbc148a6d7cb7549e10b3d67c6c&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
        </div>
        <div class="text-overflow game-card-name" title="Hide and Seek Extreme" ng-non-bindable>
            Hide and Seek Extreme
        </div>
        <div class="game-card-name-secondary">
            449 Playing
        </div>
        <div class="game-card-vote">
            <div class="vote-bar">
                <div class="vote-thumbs-up">
                    <span class="icon-thumbs-up"></span>
                </div>
                <div class="vote-container" data-upvotes="88300" data-downvotes="10816" data-voting-processed="false">
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
                <div class="vote-down-count">10,816</div>
                <div class="vote-up-count">88,300</div>

            </div>
        </div>
    </a>
    <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="/users/4563899/profile">Tim7775</a>
    </span>
    </div>
</li>

</ul>
                    </div>

<div>
    <div id="AjaxCommentsContainer" class="comments-container" data-asset-id="189707" data-total-collection-size="" data-is-user-authenticated="<?php echo json_encode($loggedIn); ?>" data-signin-url="/newlogin?returnUrl=%2Fgames%2F189707%2FNatural-Disaster-Survival">
        <div class="container-header">
            <h3>Comments</h3>
        </div>
        <div class="section-content AddAComment">
            <div class="comment-form">
                <form class="form-horizontal ng-pristine ng-valid" role="form">
                    <div class="form-group">
                        <textarea class="form-control input-field rbx-comment-input blur" placeholder="Write a comment!" rows="1"></textarea>
                        <div class="rbx-comment-msgs">
                            <span class="rbx-comment-error text-error text-overflow"></span>
                            <span class="rbx-comment-count small"></span>
                        </div>
                    </div>
                    <button type="button" class="btn-secondary-md rbx-post-comment">Post Comment</button>
                </form>
            </div>
            <div class="comments vlist">

            </div>
            <div class="comments-item-template">
                <div class="comment-item list-item">
                    <div class="comment-user list-header">
                            <div class="Avatar avatar avatar-headshot-md" data-user-id="comment-author-id" data-image-size="small"></div>

                    </div>
                    <div class="comment-body list-body">
                        <a class="text-name">username</a>
                        <p class="comment-content list-content"> text </p>
                        <span class="xsmall text-date-hint">4 hours ago</span>
                    </div>
                    <div class="comment-controls">
                        <a class="rbx-comment-report-link" href="/abusereport/comment?id=%CommentID&amp;RedirectUrl=%PageURL" title="Report Abuse"><span class="icon-flag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="AjaxCommentsMoreButtonContainer" class="ajax-comments-more-button-container">
        <button type="button" class="btn-control-sm rbx-comments-see-more hidden">See More</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        Roblox.Comments.Resources = {
            //<sl:translate>
            defaultMessage: 'Write a comment!',
            noCommentsFound: 'No comments found.',
            moreComments: 'More comments',
            sorrySomethingWentWrong: 'Sorry, something went wrong.',
            charactersRemaining: ' characters remaining',
            emailVerifiedABTitle: 'Verify Your Email',
            emailVerifiedABMessage: "You must verify your email before you can comment. You can verify your email on the <a class='text-link' href='/my/account?confirmemail=1'>Account</a> page.",
            linksNotAllowedTitle: 'Links Not Allowed',
            linksNotAllowedMessage: 'Comments should be about the item or place on which you are commenting. Links are not permitted.',
            accept: 'Verify',
            decline: 'Cancel',
            tooManyCharacters: 'Too many characters!',
            tooManyNewlines: 'Too many newlines!'
            //</sl:translate>
        };

        Roblox.Comments.Limits =
        [
            {
                limit: '10',
                character: "\n",
                message: Roblox.Comments.Resources.tooManyNewlines
            },
            {
                limit: '200',
                character: undefined,
                message: Roblox.Comments.Resources.tooManyCharacters
            }
        ];

        Roblox.Comments.FilterIsEnabled = true;
        Roblox.Comments.FilterRegex = "(([a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}[:\\#/\?]+)|([a-zA-Z0-9]\\.[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}))";
        Roblox.Comments.FilterCleanExistingComments = false ;

    Roblox.Comments.initialize();
    });
</script>

            </div>
            <div class="tab-pane store" id="store">




<div id="rbx-game-passes" class="container-list game-dev-store game-passes">
    <div class="container-header">
        <h3>Passes for this game</h3>
    </div>
    <ul id="rbx-passes-container" class="hlist store-cards gear-passes-container">
            <li class="list-item">
                <div class="store-card">
                    <a href="/Green-Balloon-item?id=118764786" class="gear-passes-asset"><img class="" src="/t2.rbxcdn.com/908f35c55a3e65b7e8726ac1b14bfe6c"/></a>
                    <div class="store-card-caption">
                        <div class="text-overflow store-card-name" title="Green Balloon">
                            Green Balloon
                        </div>

                        <div class="store-card-price">
                            <span class="icon-robux-16x16"></span>
                            <span class="text-robux">80</span>
                        </div>

                        <div class="store-card-footer">
                                <button class="PurchaseButton btn-buy-md btn-full-width rbx-gear-passes-purchase" data-item-id="118764786" data-item-name="Green Balloon" data-product-id="16523255" data-expected-price="80" data-asset-type="Game Pass" data-bc-requirement="" data-expected-seller-id="80254" data-seller-name="Stickmasterluke" data-expected-currency="1">
                                    <span>Buy</span>
                                </button>
                        </div>

                    </div>

                </div>
            </li>
            <li class="list-item">
                <div class="store-card">
                    <a href="/Red-Apple-item?id=184766955" class="gear-passes-asset"><img class="" src="/t3.rbxcdn.com/a92a8317564b864c18bc9273f1abbfa0"/></a>
                    <div class="store-card-caption">
                        <div class="text-overflow store-card-name" title="Red Apple">
                            Red Apple
                        </div>

                        <div class="store-card-price">
                            <span class="icon-robux-16x16"></span>
                            <span class="text-robux">80</span>
                        </div>

                        <div class="store-card-footer">
                                <button class="PurchaseButton btn-buy-md btn-full-width rbx-gear-passes-purchase" data-item-id="184766955" data-item-name="Red Apple" data-product-id="21584689" data-expected-price="80" data-asset-type="Game Pass" data-bc-requirement="" data-expected-seller-id="80254" data-seller-name="Stickmasterluke" data-expected-currency="1">
                                    <span>Buy</span>
                                </button>
                        </div>

                    </div>

                </div>
            </li>
            </ul>



</div>

<script>
    $(function () {
        Roblox.GamePassJSData = { };
        Roblox.GamePassJSData.PlaceID = 189707;

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.store-card-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();

        };
        Roblox.GamePassItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);

        $("#store #rbx-game-passes").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-pass');
        });

        $("#store #rbx-game-passes .btn-more").on("click", function (e) {
            $("#rbx-game-passes #rbx-passes-container").toggleClass("collapsed");
        });
    });
</script>





<input name="__RequestVerificationToken" type="hidden" value="o1tvVfcBXn7o2kz7LarVP-L1MQDKPXo0Tj0L2GnN9a4nfMRzA2R7IfqoA3KR31vuWqrgp-ENOqXLKKLvXA713gppm5c1"/>

<script>
    // From DisplayProductPromotions
    $(function() {
        Roblox.PlaceProductPromotion.Resources = {
            //<sl:translate>
            anErrorOccurred: 'An error occurred, please try again.'
            , youhaveAdded: "You have added "
            , toYourGame: " to your game, "
            , youhaveRemoved: "You have removed "
            , fromYourGame: " from your game."
            , ok: "OK"
            , success: "Success!"
            , error: "Error"
            , sorryWeCouldnt: "Sorry, we couldn't remove the item from your game. Please try again."
            , notForSale: "This item is not for sale."
            , rent: "Rent"
            //<sl:translate>
        };

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.store-card-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();

        };
        Roblox.PlaceProductPromotionItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);
        Roblox.PlaceProductPromotion.PlaceID = 189707;

        $("#store").on("click", ".icon-delete", function(e) {
            var promoId = $(this).data('delete-promotion-id');
            Roblox.PlaceProductPromotion.DeleteGear(promoId);
        });

        $("#store #rbx-game-gear").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-gear');
        });

        $("#store #rbx-game-gear .btn-more").on("click", function (e) {
            $("#rbx-game-gear .rbx-gear-container").toggleClass("collapsed");
        });

    });

</script>

<div id="DeleteProductPromotionModal" class="PurchaseModal">
    <div id="simplemodal-close" class="simplemodal-close">
        <a></a>
    </div>
    <div class="titleBar" style="text-align: center">
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div class="PurchaseModalMessageImage">
                <div class="thumbs-up-green">
                </div>
            </div>
            <div class="PurchaseModalMessageText">
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <div class="ImageButton btn-blue-ok-sharp simplemodal-close"></div>
        </div>
        <div class="PurchaseModalFooter"></div>
    </div>
</div>




            </div>

            <div class="tab-pane" id="leaderboards">

                    <div class="col-md-6">


<div id="rbx-leaderboard-container-player" class="section rbx-leaderboard-container rbx-leaderboard-player" data-associated-leaderboard-more="rbx-leaderboard-btn-player">
    <div class="rbx-leaderboard-data" data-distributor-target-id="65241" data-max="20" data-rank-max="4" data-target-type="0" data-time-filter="1" data-player-id="-1" data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar avatar-headshot-sm"></div>
            <div class="name-and-group"></div>
            <div class="font-fold points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-player">
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Players</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-player" data-original-title="" title="" data-viewport=".rbx-leaderboard-player" data-placement="left"><span class="icon-sorting" id="rbx-leaderboard-popover-player"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="section-content rbx-leaderboard-items">
        <div class="rbx-leaderboard-more-container rbx-leaderboard-btn-player" data-associated-leaderboard="rbx-leaderboard-player">
            <button type="button" class="btn-control-sm rbx-leaderboard-see-more hidden">
                See More
            </button>
        </div>
        <img class="spinner" src="/images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="loading..."/>
    </div>

</div>

    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>
                    <div class="col-md-6">


<div id="rbx-leaderboard-container-clan" class="section rbx-leaderboard-container rbx-leaderboard-clan" data-associated-leaderboard-more="rbx-leaderboard-btn-clan">
    <div class="rbx-leaderboard-data" data-distributor-target-id="65241" data-max="20" data-rank-max="4" data-target-type="1" data-time-filter="1" data-player-id="-1" data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar "></div>
            <div class="name-and-group"></div>
            <div class="font-fold points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-clan">
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Clans</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-clan" data-original-title="" title="" data-viewport=".rbx-leaderboard-clan" data-placement="left"><span class="icon-sorting" id="rbx-leaderboard-popover-clan"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="section-content rbx-leaderboard-items">
        <div class="rbx-leaderboard-more-container rbx-leaderboard-btn-clan" data-associated-leaderboard="rbx-leaderboard-clan">
            <button type="button" class="btn-control-sm rbx-leaderboard-see-more hidden">
                See More
            </button>
        </div>
        <img class="spinner" src="/images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="loading..."/>
    </div>

</div>

    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>

                <script>

                    // lazy load
                    $(".rbx-tab a[href='#leaderboards']").on('shown.bs.tab', function(e) {
                        // e.target newly activated tab
                        // e.relatedTarget previous active tab
                        Roblox.Leaderboard.init();
                    });
                </script>
            </div>

            <div class="tab-pane game-instances" id="game-instances">




    <div id="rbx-running-games" class="container-list" data-placeid="189707" data-showshutdown data-avatar-headshot-enabled="true">
        <div class="container-header">
            <h3>Running Games</h3>
            <span class="btn-fixed-width btn-control-xs btn-more rbx-running-games-refresh">Refresh</span>
        </div>
        <ul id="rbx-game-server-item-container" class="section rbx-game-server-item-container">

        </ul>
        <div class="rbx-running-games-footer">
                <button type="button" class="btn-control-md btn-full-width rbx-running-games-load-more hidden">Load More</button>

        </div>
        <div class="rbx-game-server-template">
            <li class="section-content rbx-game-server-item">
                <div class="section-header">
                    <div class="link-menu rbx-game-server-menu"></div>
                </div>
                <div class="section-left rbx-game-server-details">
                    <div class="rbx-game-status rbx-game-server-status">x of y players max</div>
                    <div class="rbx-game-server-alert">
                        <span class="icon-remove"></span>Slow Game
                    </div>
                    <a class="btn-full-width btn-control-xs rbx-game-server-join" href="#" data-placeid>Join</a>

                </div>
                <div class="section-right rbx-game-server-players">
                </div>
            </li>
        </div>
    </div>



            </div>
        </div>
    </div>
</div>



<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer">
                <img class="GenericModalImage" alt="generic image"/>
            </div>
            <div class="Message"></div>
        </div>
        <div class="clear"></div>
        <div id="GenericModalButtonContainer" class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
        </div>
    </div>
</div>



<div id="ItemPurchaseAjaxData" data-has-currency-service-error="False" data-currency-service-error-message="" data-authenticateduser-isnull="True" data-user-balance-robux="0" data-user-balance-tickets="0" data-user-bc="0" data-continueshopping-url="/games/189707/Natural-Disaster-Survival" data-imageurl="http://t7.rbxcdn.com/1691d7aa4546166343b2fcc4ed5061ba" data-alerturl="http://images.rbxcdn.com/b7353602bbf9b927d572d5887f97d452.svg" data-insufficentfundsurl="http://images.rbxcdn.com/b80339ddf867ccfe6ab23a2c263d8000.png" data-builderscluburl="http://images.rbxcdn.com/ae345c0d59b00329758518edc104d573.png">

</div>


<div id="ProcessingView" style="display:none">
    <div class="ProcessingModalBody">
        <p style="margin:0px"><img src="/images.rbxcdn.com/116db03ed7027c242f773e70a4ed2e68.png" alt="Processing..."/></p>
        <p style="margin:7px 0px">Processing Transaction</p>
    </div>
</div>




<div id="BCOnlyModal" class="modal-dialog" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="$.modal.close();">
                <span aria-hidden="true">
                    <span class="icon-close"></span>
                </span>
                <span class="sr-only">Close</span>
            </button>
            <h5>Builders Club Only</h5>
        </div>
        <div class="modal-body">
            <div id="BCMessageDiv">
                This is a premium item only available to our Builders Club members.
            </div>
            <div class="modal-image-container">
                <span class="icon-default-bc upgrade-icon-bc"></span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="/premium/membership?ctx=bc-only-item" class="btn-primary-md">Upgrade Now</a>
            <button type="button" class="btn-control-md" onclick="$.modal.close();">Cancel</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showBCOnlyModal(modalId) {
        var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000" } };
        if (typeof modalId === "undefined")
            $("#BCOnlyModal").modal(modalProperties);
        else
            $("#" + modalId).modal(modalProperties);
    }
    $(document).ready(function () {
        $('#VOID').click(function () {
            showBCOnlyModal("BCOnlyModal");
            return false;
        });
    });
</script>


                <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">


<iframe name="Roblox_GameDetail_Right_160x600" allowtransparency="true" frameborder="0" height="612" scrolling="no" src="/userads/2" width="160" data-js-adtype="iframead"></iframe>

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
                    Roblox.VideoPreRoll.videoOptions.categories = "AgeUnknown,GenderUnknown,All";
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
                <a href="/?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fgames%2F189707%2FNatural-Disaster-Survival"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="/newlogin?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fgames%2F189707%2FNatural-Disaster-Survival">I have an account</a>
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

<script type="text/javascript" src="/js.rbxcdn.com/c55982be90aee588f799ba26ede12190.js"></script>

<script type="text/javascript">
    Roblox.Client._skip = null;//'/install/unsupported.aspx';
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



    <script type="text/javascript" src="/js.rbxcdn.com/af5ff966d3c4f285d2272fdca56d2cd6.js"></script>



                    <script type="text/javascript" src="/js.rbxcdn.com/822491cace41a2d39fd76db6cfd17800.js"></script>



    <script type="text/javascript">Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'http://js.rbxcdn.com/c14a216bd7773e7b637b4e6c3c2e619d.js';Roblox.config.paths['Pages.CatalogShared'] = 'http://js.rbxcdn.com/4acfdab2e6131feb84d783765b82a888.js';Roblox.config.paths['Widgets.AvatarImage'] = 'http://js.rbxcdn.com/6bac93e9bb6716f32f09db749cec330b.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'http://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'http://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'http://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'http://js.rbxcdn.com/8db82e6d725b907e91441b849cc35e47.js';Roblox.config.paths['Widgets.PlaceImage'] = 'http://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'http://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script>


    <script>
        Roblox.XsrfToken.setToken('vpRs3voMaUkN');
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


    <script type="text/javascript" src="/js.rbxcdn.com/10fb19f8577263aefb65cbd86634e9f9.js"></script>




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
        <img src="/b.scorecardresearch.com/p?c1=2&amp;c2=&amp;c3=&amp;c4=&amp;c5=&amp;c6=&amp;c15=&amp;cv=2.0&amp;cj=1"/>
    </noscript>
</body>
</html>
