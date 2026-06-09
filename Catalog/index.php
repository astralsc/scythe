<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
?>

<?php
include __DIR__ . '/../config/db.php';
include __DIR__ . '/../config/config.php';

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
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<!-- MachineID: WEB165 -->
<head id="ctl00_Head1">
<title>
	Catalog - ROBLOX
</title>
<link rel="stylesheet" href="/static.rbxcdn.com/css/MainCSS___c7ad5840276b0da173a93d991c205355_m.css/fetch"/>

<link rel="stylesheet" href="/static.rbxcdn.com/css/page___c9c0bf9807c51dab7f7d436a5ffc59df_m.css/fetch"/>

        <link href="/../favicon.ico" rel="icon"/>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/../favicon.ico"/><meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation"/>
<meta name="description" content="Become part of the ultimate Imagination Platform by customizing an avatar with the endless combinations of items that can be created by you or other adventurers."/>
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine"/>
<meta name="apple-itunes-app" content="app-id=431946152"/>
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY"/>
    <meta property="og:site_name" content="ROBLOX"/>
    <meta property="og:title" content="ROBLOX Catalog"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="/catalog"/>
    <meta property="og:description" content="Become part of the ultimate Imagination Platform by customizing an avatar with the endless combinations of items that can be created by you or other adventurers."/>
    <meta property="og:image" content="/t4.rbxcdn.com/053d1e50d15ad33aee65ad1ad1da7360"/>
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="ROBLOX Catalog">
    <meta name="twitter:description" content="Become part of the ultimate Imagination Platform by customizing an avatar with the endless combinations of items that can be created by you or other adventurers.">
    <meta name="twitter:creator">
    <meta name="twitter:image1" content="https://t4.rbxcdn.com/053d1e50d15ad33aee65ad1ad1da7360"/>
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
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type="text/javascript" src="/ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>

    <script type="text/javascript">

        var _gaq = _gaq || [];

            window.GoogleAnalyticsDisableRoblox2 = true;
        _gaq.push(['b._setAccount', 'UA-486632-1']);
        _gaq.push(['b._setCampSourceKey', 'rbx_source']);
        _gaq.push(['b._setCampMediumKey', 'rbx_medium']);
        _gaq.push(['b._setCampContentKey', 'rbx_campaign']);

            _gaq.push(['b._setDomainName', 'roblox.com']);

            _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Anonymous', 2]);
                _gaq.push(['b._setPageGroup', 1, 'Catalog']);
                
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
                    _gaq.push(['c._setPageGroup', 1, 'Catalog']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
<script type="text/javascript" src="/js.rbxcdn.com/4dadf6b6a560b0c5a26ac6644f7698ac.js"></script>
        <script type="text/javascript">
            if (Roblox && Roblox.EventStream) {
                Roblox.EventStream.Init("https://ecsv2.roblox.com/www/e.png",
                    "https://ecsv2.roblox.com/www/e.png",
                    "https://ecsv2.roblox.com/pe?t=studio",
                    "https://ecsv2.roblox.com/pe?t=diagnostic");
            }
        </script>


<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script><script type="text/javascript">Roblox.config.externalResources = [];Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/c14a216bd7773e7b637b4e6c3c2e619d.js';Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/4acfdab2e6131feb84d783765b82a888.js';Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/6bac93e9bb6716f32f09db749cec330b.js';Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/7b436bae917789c0b84f40fdebd25d97.js';Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/33d82b98045d49ec5a1f635d14cc7010.js';Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3368571372da9b2e1713bb54ca42a65a.js';Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/8db82e6d725b907e91441b849cc35e47.js';Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/f2697119678d0851cfaa6c2270a727ed.js';Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/d6e979598c460090eafb6d38231159f6.js';</script><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script><script type="text/javascript" src="/js.rbxcdn.com/e67b413c9056ca52e49b129e8d332909.js"></script>


        <link rel="canonical" href="/catalog/"/>
        <script type="text/javascript">
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
Roblox.Endpoints.Urls['/chat/chat'] = '/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = '/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = '/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = '/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = '/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = '/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.roblox.com/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.roblox.com/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = '/catalog/contents';
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
<body id="rbx-body" class="" data-performance-relative-value="0.5" data-internal-page-name="Catalog" data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>
<div id="image-retry-data" data-image-retry-max-times="10" data-image-retry-timer="1500">
</div>
<div id="http-retry-data" data-http-retry-max-timeout="8000" data-http-retry-base-timeout="1000">
</div>
    <script type="text/javascript">Roblox.XsrfToken.setToken('5+ta1MNACw8L');</script>
 
    <script type="text/javascript">
        if (top.location != self.location) {
            top.location = self.location.href;
        }
    </script>
  
<style type="text/css">
    
</style>
<form name="aspnetForm" method="post" action="/catalog/" id="aspnetForm" class="nav-container no-gutter-ads">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value=""/>
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value=""/>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="75WAqkv8Z52AIUOr7QTeJHp0j38Ihx6jJ8lqRPyTGcI/qfpcNmDjpw0/mdHF/daoGBa6f86b3rcrUWvzdNSpEol5uJHxy6lR+orV4ViHBcofZorIgaTPLe6CR0pRYEbxc9hQtXv2QSV+K4+py3Z9bKpf3+mIqlAhMZDp2qKGn148tsIlKsbT95pwqNkU0eINAWUtDynvahqmPmjtDKVT5vPn6Y5ZD8h9nDflztVsniJiY6kcOGX+Lwrf/XGOtmkBH9QhIQ=="/>
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="/ajax.aspnetcdn.com/ajax/4.5.1/1/WebForms.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
window.WebForm_PostBackOptions||document.write('<script type="text/javascript" src="/WebResource.axd?d=pynGkmcFUV13He1Qd6_TZH6GgOgBQtqMPCPjRUnhj_pzNesAXKuAdu2pj-Sq-3JDJIgwEw2&amp;t=635589219571259667"><\/script>');//]]>
</script>



<script src="/ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjax.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys._Application && Sys.Observer)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=uHIkleVeDJf4xS50Krz-yA3kt4iEPLwQOcXDJXuiLb543xmSxgoBWyWb-0CTRrqRXPsCyYHFJoMX6TPqspOUhmvwRxW7JGKByJCuSKPDJkedBK4vZ68d-hQEQYwPVMjKP6tsCULlkgnx_6P0HwSsu1ZPvc01&t=ffffffff805766b3"><\/script>');//]]>
</script>

<script src="/ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjaxWebForms.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys.WebForms)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=Jw6tUGWnA15YEa3ai3FadCEDqusVaOyrhfy39auVd1FmNPcggz_w8ujNbCmSe3d-g1mfv3ai8xe7-2Ze2qr2BxMVxfFYswV1Y4rdnmWJF2uUrOEaDJiBEGKAzXrJcfxb_Yfc2xbZMZu9pLQP2d6b-KwvlK01&t=ffffffff805766b3"><\/script>');//]]>
</script>

<script src="/ScriptResource.axd?d=b_BBi8tCgVzMS1gHBG9Ba4zUn_hBZ5xBc-lpcM68smuw4ZRmK1nHnVNDgcubV4sEFh_wTUjdFycWbmyO-abn5pzh4DbgZVYTgT_Z8n5_DXb4Vi6Hy6iFdSAgt9eMZy2UHfj5jAZ4E0fpqE21fMFJqH7QGgzst2I3o9hddXwuIs3eok-iv6BLFt5Zh-hKrC3LB-_7BFyvrvQ79fa-Lx8nlLVHSp9jGlzLQUhkvsMuF4yVEwQa0" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="2BFC4FE3"/>
</div>
    <div id="fb-root">
    </div>
    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>

    
         
    
    
    


<?php pageBuilder::buildHeader(); ?>

<script type="text/javascript">
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>


        <div id="navContent" class="nav-content"><div class="nav-content-inner">
    <div id="MasterContainer">
        

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



        <script type="text/javascript">Roblox.FixedUI.gutterAdsEnabled=false;</script>

        

        <div id="Container">
            
            
        </div>

		
        
        <noscript><div class="alert-info"><h5>Please enable Javascript to use all the features on this site.</h5></div></noscript>
        
        <?php if (!empty($banner)): ?>
        <div /*style="background-color: green";*/ class="alert-info" role="alert"><?php echo $bannerLabel;?></div>
        <?php endif; ?>   
        
        
        
        
    <div id="AdvertisingLeaderboard" class="top-ad-728">
        

<iframe name="Roblox_Catalog_Top_728x90" allowtransparency="true" frameborder="0" height="110" scrolling="no" src="/userads/1" width="728" data-js-adtype="iframead"></iframe>

    </div>

        
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" class="body-width">
                    
    
<style type="text/css">
    #Body {
        padding: 5px;
    }
</style>



<div id="catalog" data-empty-search-enabled="true">
<div class="header" style="height:60px;">
        <div style="float:left;">
            <h1><a href="/catalog" id="CatalogLink">Catalog</a></h1>
        </div>
    <div class="CatalogSearchBar">
        <input id="keywordTextbox" name="name" type="text" class="translate text-box text-box-small"/>
        <div style="height:23px;border:1px solid #a7a7a7;padding:2px 2px 0px 2px;margin-right:6px;float:left;position:relative">
            <!--[if IE7]>
                <div style="height:19px;width:131px;position:absolute;top:2px;left:2px;border:1px solid white"></div>
                <div style="height:19px;width:15px;position:absolute;top:2px;right:2px;border:1px solid #aaa"></div>
            <![endif]-->
            <select id="categoriesForKeyword" style="">
                    <option value="1">All Categories</option>
                    <option value="0">Featured</option>
                    <option value="2">Collectibles</option>
                    <option value="3">Clothing</option>
                    <option value="4">Body Parts</option>
                    <option value="5">Gear</option>
            </select>
        </div>
        <a id="submitSearchButton" href="#" class="btn-control btn-control-large top-level">Search</a>
    </div>
</div>


    <div class="left-nav-menu divider-right">



    <div class="browseDropdownHeader"></div>

<div id="dropdown" class="splashdropdownsplashdropdown roblox-hierarchicaldropdown">
    <ul id="dropdownUl" class="clearfix">

            <li class="subcategories" data-delay="never">
                <a href="#category=featured" class="assetTypeFilter" data-category="0">Featured</a>
                <ul class="slideOut" style="top:-1px;">
                    <li class="slideHeader"><span>Featured Types</span></li>
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="0" data-category="0">All Featured Items</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="9" data-category="0">Featured Hats</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="5" data-category="0">Featured Gear</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="10" data-category="0">Featured Faces</a></li>    
                        <li><a href="#category=featured" class="assetTypeFilter" data-types="11" data-category="0">Featured Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=collectibles" class="assetTypeFilter collectiblesLink" data-category="2">Collectibles</a>
                <ul class="slideOut" style="top:-32px;">
                    <li class="slideHeader"><span>Collectible Types</span></li>
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="2" data-category="2">All Collectibles</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="10" data-category="2">Collectible Faces</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="9" data-category="2">Collectible Hats</a></li>    
                        <li><a href="#category=collectibles" class="assetTypeFilter" data-types="5" data-category="2">Collectible Gear</a></li>    
                </ul>
            </li>

            <li class="slideHeader DropdownDivider divider-bottom" data-delay="ignore"></li>

            <li data-delay="always">
                <a href="#category=all" class="assetTypeFilter" data-category="1">All Categories</a>
            </li>
        
            <li class="subcategories">
                <a href="#category=clothing" class="assetTypeFilter" data-category="3">Clothing</a>
                <ul class="slideOut" style="top:-97px;">
                    <li class="slideHeader"><span>Clothing Types</span></li>
                        <li><a href="#" class="assetTypeFilter" data-types="3" data-category="3">All Clothing</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="9" data-category="3">Hats</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="12" data-category="3">Shirts</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="13" data-category="3">T-Shirts</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="14" data-category="3">Pants</a></li>    
                        <li><a href="#" class="assetTypeFilter" data-types="11" data-category="3">Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=bodyparts" class="assetTypeFilter" data-category="4">Body Parts</a>
                <ul class="slideOut" style="top:-128px;">
                    <li class="slideHeader"><span>Body Part Types</span></li>
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="4" data-category="4">All Body Parts</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="15" data-category="4">Heads</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="10" data-category="4">Faces</a></li>    
                        <li><a href="#category=bodyparts" class="assetTypeFilter" data-types="11" data-category="4">Packages</a></li>    
                </ul>
            </li>
        
            <li class="subcategories"><a href="#category=gear" class="assetTypeFilter" data-category="5">Gear</a>
                <ul class="slideOut" style="top:-159px; width:auto;" style="border-right:0px;">
                    <div>
                        <li class="slideHeader"><span>Gear Categories</span></li>
                            <li><a href="#geartype=All Gear" class="gearFilter" data-category="5" data-types="All">All Gear</a></li>
                            <li><a href="#geartype=Melee Weapon" class="gearFilter" data-category="5" data-types="1">Melee Weapon</a></li>
                            <li><a href="#geartype=Ranged Weapon" class="gearFilter" data-category="5" data-types="2">Ranged Weapon</a></li>
                            <li><a href="#geartype=Explosive" class="gearFilter" data-category="5" data-types="3">Explosive</a></li>
                            <li><a href="#geartype=Power Up" class="gearFilter" data-category="5" data-types="4">Power Up</a></li>
                            <li><a href="#geartype=Navigation Enhancer" class="gearFilter" data-category="5" data-types="5">Navigation Enhancer</a></li>
                            <li><a href="#geartype=Musical Instrument" class="gearFilter" data-category="5" data-types="6">Musical Instrument</a></li>
                            <li><a href="#geartype=Social Item" class="gearFilter" data-category="5" data-types="7">Social Item</a></li>
                            <li><a href="#geartype=Building Tool" class="gearFilter" data-category="5" data-types="8">Building Tool</a></li>
                            <li><a href="#geartype=Personal Transport" class="gearFilter" data-category="5" data-types="9">Personal Transport</a></li>
                    </div>

                </ul>
            </li>
        
                                    </ul>
</div>
<div id="legend" class="">
    <div class="header expanded" id="legendheader">
        <h3>Legend</h3>
    </div>
    <div id="legendcontent" style="overflow: hidden; ">
        <img src="/images.rbxcdn.com/4fc3a98692c7ea4d17207f1630885f68.png" style="margin-left: -13px"/>
        <div class="legendText"><b>Builders Club Only</b><br/>
        Only purchasable by Builders Club members.</div>

        <img src="/images.rbxcdn.com/793dc1fd7562307165231ca2b960b19a.png" style="margin-left: -13px"/>
        <div class="legendText"><b>Limited Items</b><br/>
        Owners of these discontinued items can re-sell them to other users at any price.</div>
        
        <img src="/images.rbxcdn.com/d649b9c54a08dcfa76131d123e7d8acc.png" style="margin-left: -13px"/>
        <div class="legendText"><b>Limited Unique Items</b><br/>
        A limited supply originally sold by ROBLOX. Each unit is labeled with a serial number. Once sold out, owners can re-sell them to other users.
        </div>
    </div>
</div>                           
    </div>
    <div class="right-content divider-left">
        <a href="/upgrades/robux?ctx=catalog" class="btn-medium btn-primary">Buy ROBUX</a>

        <h2>Featured Items on ROBLOX</h2>
        <div style="clear:both;"></div>
        
        



<div class="CatalogItemOuter BigOuter">
<div class="SmallCatalogItemView BigView">
<div class="CatalogItemInner BigInner">    
        <div class="roblox-item-image image-large" data-item-id="461493646" data-image-size="large">
            <div class="item-image-wrapper">
                <a href="/Wizardsaurus-item?id=461493646">
                    <img title="Wizardsaurus" alt="Wizardsaurus" class="original-image " src="/t4.rbxcdn.com/3f8439ba1070f814fe0f356ca77ac93a"/>
                                                                <img src="/images.rbxcdn.com/189fd0a5fee903ef4ad2337ecfea5a00.png" alt="Deadline"/>
                                            <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Wizardsaurus-item?id=461493646" title="Wizardsaurus">Wizardsaurus</a></div>
            <div class="robux-price"><span class="robux notranslate">100</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">2,613</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">138 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter BigOuter">
<div class="SmallCatalogItemView BigView">
<div class="CatalogItemInner BigInner">    
        <div class="roblox-item-image image-large" data-item-id="461493477" data-image-size="large">
            <div class="item-image-wrapper">
                <a href="/Ancient-Wizard-Beard-item?id=461493477">
                    <img title="Ancient Wizard Beard" alt="Ancient Wizard Beard" class="original-image " src="/t1.rbxcdn.com/bce2df8deb6eb36284a432d031720840"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Ancient-Wizard-Beard-item?id=461493477" title="Ancient Wizard Beard">Ancient Wizard Beard</a></div>
            <div class="robux-price"><span class="robux notranslate">300</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">747</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">231 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter BigOuter">
<div class="SmallCatalogItemView BigView">
<div class="CatalogItemInner BigInner">    
        <div class="roblox-item-image image-large" data-item-id="462161317" data-image-size="large">
            <div class="item-image-wrapper">
                <a href="/Cloak-of-the-Flames-item?id=462161317">
                    <img title="Cloak of the Flames" alt="Cloak of the Flames" class="original-image " src="/t5.rbxcdn.com/a9f86a7b26976f41b010046156b54d72"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Cloak-of-the-Flames-item?id=462161317" title="Cloak of the Flames">Cloak of the Flames</a></div>
            <div class="robux-price"><span class="robux notranslate">750</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">262</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">227 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter BigOuter">
<div class="SmallCatalogItemView BigView">
<div class="CatalogItemInner BigInner">    
        <div class="roblox-item-image image-large" data-item-id="461490641" data-image-size="large">
            <div class="item-image-wrapper">
                <a href="/Hooded-Figure-item?id=461490641">
                    <img title="Hooded Figure" alt="Hooded Figure" class="original-image " src="/t2.rbxcdn.com/e42ef5920c05a52ce21427653d090c01"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Hooded-Figure-item?id=461490641" title="Hooded Figure">Hooded Figure</a></div>
            <div class="robux-price"><span class="robux notranslate">200</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">1,192</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">536 times</span></div>
        </div>
</div>
</div>	
</div>
        <div style="clear:both"></div>



<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="462220417" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Fire-Wizard-item?id=462220417">
                    <img title="Fire Wizard" alt="Fire Wizard" class="original-image " src="/t3.rbxcdn.com/9912791b8feb35f8d104246b33ea2d13"/>
                                            <img src="/images.rbxcdn.com/d649b9c54a08dcfa76131d123e7d8acc.png" alt="Limited Unique" class="limited-overlay">
                                                                <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Fire-Wizard-item?id=462220417" title="Fire Wizard">Fire Wizard</a></div>
                <div class="robux-price"><span class="SalesText">was </span><span class="robux notranslate">2,000</span></div>
            <div id="PrivateSales"><span class="SalesText">now </span><span class="robux notranslate">2,376</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">550</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">77 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461491079" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Flower-Crowned-Red-Locks-item?id=461491079">
                    <img title="Flower Crowned Red Locks" alt="Flower Crowned Red Locks" class="original-image " src="/t2.rbxcdn.com/c88b15766c0e4d38d65c24c6d958b9c5"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Flower-Crowned-Red-Locks-item?id=461491079" title="Flower Crowned Red Locks">Flower Crowned Red Locks</a></div>
            <div class="robux-price"><span class="robux notranslate">175</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">435</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">233 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461491285" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Red-Braided-Beard-item?id=461491285">
                    <img title="Red Braided Beard" alt="Red Braided Beard" class="original-image " src="/t0.rbxcdn.com/ca9bf2091451c2c12003087b08af28c3"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Red-Braided-Beard-item?id=461491285" title="Red Braided Beard">Red Braided Beard</a></div>
            <div class="robux-price"><span class="robux notranslate">200</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">508</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">186 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461493251" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Summer-Wizard-item?id=461493251">
                    <img title="Summer Wizard" alt="Summer Wizard" class="original-image " src="/t2.rbxcdn.com/d8d183a265ffca5fb4a1d03104b120a2"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Summer-Wizard-item?id=461493251" title="Summer Wizard">Summer Wizard</a></div>
            <div class="robux-price"><span class="robux notranslate">75</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">16 hours ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">384</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">54 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461489128" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Wizard-Flight-Spell-item?id=461489128">
                    <img title="Wizard Flight Spell" alt="Wizard Flight Spell" class="original-image " src="/t4.rbxcdn.com/7a622b4d712633538326ac2194432131"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Wizard-Flight-Spell-item?id=461489128" title="Wizard Flight Spell">Wizard Flight Spell</a></div>
            <div class="robux-price"><span class="robux notranslate">400</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">166</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">174 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461493088" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Pink-and-Black-Wizard-Hat-item?id=461493088">
                    <img title="Pink and Black Wizard Hat" alt="Pink and Black Wizard Hat" class="original-image " src="/t5.rbxcdn.com/962ff0e4c038499086a6b57ecc9be48d"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Pink-and-Black-Wizard-Hat-item?id=461493088" title="Pink and Black Wizard Hat">Pink and Black Wizard Hat</a></div>
            <div class="robux-price"><span class="robux notranslate">100</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">4 hours ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">150</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">50 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="461488745" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Flaming-Orb-of-Divine-Pain-item?id=461488745">
                    <img title="Flaming Orb of Divine Pain" alt="Flaming Orb of Divine Pain" class="original-image " src="/t5.rbxcdn.com/085f034b90f6a6cdd8e7a3a163ecadbe"/>
                                                                                    <img src="/images.rbxcdn.com/b84cdb8c0e7c6cbe58e91397f91b8be8.png" alt="New"/>
                </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Flaming-Orb-of-Divine-Pain-item?id=461488745" title="Flaming Orb of Divine Pain">Flaming Orb of Divine Pain</a></div>
            <div class="robux-price"><span class="robux notranslate">500</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">89</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">157 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="460099901" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Anti-Gravity-Acorn-item?id=460099901">
                    <img title="Anti-Gravity Acorn" alt="Anti-Gravity Acorn" class="original-image " src="/t2.rbxcdn.com/290c4bcc633a59d0ae1b8a10f9950b6d"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Anti-Gravity-Acorn-item?id=460099901" title="Anti-Gravity Acorn">Anti-Gravity Acorn</a></div>
        <div><span class="NotAPrice">Free</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 day ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">251,144</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">656 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="139574419" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Frost-Guard-General-item?id=139574419">
                    <img title="Frost Guard General" alt="Frost Guard General" class="original-image " src="/t2.rbxcdn.com/a22eea9dbaebf7cb7f758f500254bf56"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Frost-Guard-General-item?id=139574419" title="Frost Guard General">Frost Guard General</a></div>
            <div class="robux-price"><span class="robux notranslate">500</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 month ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">78,938</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">8,079 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="1073690" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/JJ5x5s-White-Top-Hat-item?id=1073690">
                    <img title="JJ5x5's White Top Hat" alt="JJ5x5's White Top Hat" class="original-image " src="/t3.rbxcdn.com/0d6fc29ba3225a44d33fea1ab5bddcae"/>
                                            <img src="/images.rbxcdn.com/793dc1fd7562307165231ca2b960b19a.png" alt="Limited" class="limited-overlay">
                                                        </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/JJ5x5s-White-Top-Hat-item?id=1073690" title="JJ5x5's White Top Hat">JJ5x5&#39;s White Top Hat</a></div>
                <div class="robux-price"><span class="SalesText">was </span><span class="robux notranslate">10,000</span></div>
            <div id="PrivateSales"><span class="SalesText">now </span><span class="robux notranslate">54,990</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">3 years ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">3003</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">12,413 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="215719598" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Black-Wings-item?id=215719598">
                    <img title="Black Wings" alt="Black Wings" class="original-image " src="/t0.rbxcdn.com/6888cd8967105c10505a392fdc38ce50"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Black-Wings-item?id=215719598" title="Black Wings">Black Wings</a></div>
            <div class="robux-price"><span class="robux notranslate">1,000</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 month ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">54,849</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">11,581 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="77518833" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Korblox-Mage-item?id=77518833">
                    <img title="Korblox Mage" alt="Korblox Mage" class="original-image " src="/t6.rbxcdn.com/99be26e0ae569aa19ad301f1ea4a7708"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Korblox-Mage-item?id=77518833" title="Korblox Mage">Korblox Mage</a></div>
            <div class="robux-price"><span class="robux notranslate">750</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 month ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">56,618</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">12,588 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="106690045" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Classic-Swordpack-Throwback-item?id=106690045">
                    <img title="Classic Swordpack Throwback" alt="Classic Swordpack Throwback" class="original-image " src="/t6.rbxcdn.com/19b7830372f838052b85f6132449beca"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Classic-Swordpack-Throwback-item?id=106690045" title="Classic Swordpack Throwback">Classic Swordpack Throwback</a></div>
            <div class="robux-price"><span class="robux notranslate">150</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 month ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">316,624</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">22,605 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="1563352" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Green-Banded-Top-Hat-item?id=1563352">
                    <img title="Green Banded Top Hat" alt="Green Banded Top Hat" class="original-image " src="/t4.rbxcdn.com/71b4db9371f8f4bd54f172139da010fa"/>
                                            <img src="/images.rbxcdn.com/793dc1fd7562307165231ca2b960b19a.png" alt="Limited" class="limited-overlay">
                                                        </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Green-Banded-Top-Hat-item?id=1563352" title="Green Banded Top Hat">Green Banded Top Hat</a></div>
                <div class="robux-price"><span class="SalesText">was </span><span class="robux notranslate">3,000</span></div>
            <div id="PrivateSales"><span class="SalesText">now </span><span class="robux notranslate">2,880</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 month ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">18346</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">10,525 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="151784320" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Doge-item?id=151784320">
                    <img title="Doge" alt="Doge" class="original-image " src="/t5.rbxcdn.com/3f2d58d06b731adb328542f464cc43f5"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Doge-item?id=151784320" title="Doge">Doge</a></div>
            <div class="robux-price"><span class="robux notranslate">250</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 year ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">170,348</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">18,424 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="27847645" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Pirate-Swashbuckler-item?id=27847645">
                    <img title="Pirate Swashbuckler" alt="Pirate Swashbuckler" class="original-image " src="/t1.rbxcdn.com/bbff472550a50032d7806322740fb931"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Pirate-Swashbuckler-item?id=27847645" title="Pirate Swashbuckler">Pirate Swashbuckler</a></div>
            <div class="robux-price"><span class="robux notranslate">400</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">2 months ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">65,642</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">7,599 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="16630147" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Beautiful-Hair-for-Beautiful-People-item?id=16630147">
                    <img title="Beautiful Hair for Beautiful People" alt="Beautiful Hair for Beautiful People" class="original-image " src="/t1.rbxcdn.com/d7c3fb557331374bf3731f9c3b0d3ba4"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Beautiful-Hair-for-Beautiful-People-item?id=16630147" title="Beautiful Hair for Beautiful People">Beautiful Hair for Beautiful People</a></div>
            <div class="robux-price"><span class="robux notranslate">95</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">1 year ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">687,689</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">65,934 times</span></div>
        </div>
</div>
</div>	
</div>


<div class="CatalogItemOuter SmallOuter">
<div class="SmallCatalogItemView SmallView">
<div class="CatalogItemInner SmallInner">    
        <div class="roblox-item-image image-small" data-item-id="139610216" data-image-size="small">
            <div class="item-image-wrapper">
                <a href="/Korblox-Deathspeaker-item?id=139610216">
                    <img title="Korblox Deathspeaker" alt="Korblox Deathspeaker" class="original-image " src="/t4.rbxcdn.com/ed8c03b3e07a782bec4dfb1345fd7e5c"/>
                                                                            </a>
            </div>
        </div>
        
    <div id="textDisplay">
    <div class="CatalogItemName notranslate"><a class="name notranslate" href="/Korblox-Deathspeaker-item?id=139610216" title="Korblox Deathspeaker">Korblox Deathspeaker</a></div>
            <div class="robux-price"><span class="robux notranslate">17,000</span></div>
    </div>
        <div class="CatalogHoverContent">
            <div><span class="CatalogItemInfoLabel">Creator:</span> <span class="HoverInfo notranslate"><a href="/users/1/profile">ROBLOX</a></span></div>
            <div><span class="CatalogItemInfoLabel">Updated:</span> <span class="HoverInfo">2 months ago</span></div>
            <div><span class="CatalogItemInfoLabel">Sales:</span> <span class="HoverInfo notranslate">2,520</span></div>
            <div><span class="CatalogItemInfoLabel">Favorited:</span> <span class="HoverInfo">7,091 times</span></div>
        </div>
</div>
</div>	
</div>


        <div style="clear:both;padding-top: 50px;text-align:center;font-weight: bold;">
                <a href="#featured=all" class="assetTypeFilter" data-category="Featured">See all featured items</a>            
        </div>
    </div>
    <div style="clear:both" style="padding-top:20px"></div>
</div>

<script type="text/javascript">
    $(function () {
        Roblox.require(['Pages.Catalog', 'Pages.CatalogShared', 'Widgets.HierarchicalDropdown'], function (catalog) {
            var pagestate = { "Category": 1, "CurrencyType": 0, "SortType": 0, "SortAggregation": 3, "SortCurrency": 0, "AssetTypes": null, "Gears": null, "Genres": null, "Keyword": null, "PageNumber": 1, "Creator": null, "PxMin": 0, "PxMax": 0 };
            catalog.init(pagestate, 1);
            Roblox.Widgets.HierarchicalDropdown.init();
            if(Roblox.CatalogValues.ContainerID)
            {
                $('#' + Roblox.CatalogValues.ContainerID).on(Roblox.CatalogShared.CatalogLoadedViaAjaxEventName, null, null, Roblox.CatalogShared.handleCatalogLoadedViaAjaxEvent);
            }
        });

            Roblox.CatalogValues = Roblox.CatalogValues || {};
                    Roblox.CatalogValues.CatalogContext = 1;
    });

</script>
<!--[if IE]>
    <script type="text/javascript">
        $(function () {
            $('.BigInner').live('mouseenter', function () {                
                $(this).parents('.BigView').css('z-index', '6');
                $('.SmallView').css('z-index', '1');
            });
            $('.BigInner').live('mouseleave', function () {                
                $(this).parents('.BigView').css('z-index', '1');
                $('.SmallView').css('z-index', '6');
            });
            $('.SmallInner').live('mouseenter', function () {
                $('.SmallView').css('z-index', '1');
                $(this).parents('.SmallCatalogItemView').css('z-index', '6');
            });
            $('.SmallInner').live('mouseleave', function () {
                $('.SmallView').css('z-index', '1');
                $(this).parents('.SmallCatalogItemView').css('z-index', '1');
            });
        });
    </script>
<![endif]-->

   
    
    <script type="text/javascript">
        $(function(){
            if(true) {
                Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
                Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
            
                Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
                Roblox.CatalogValues.ContainerID = "catalog";
            
                Roblox.require(['Pages.CatalogShared'], function () {
                    History.Adapter.bind(window, "statechange", function () {
                        Roblox.CatalogShared.handleURLChange(History.getState().data);
                    });
                });
                History.replaceState({ clickTargetID: "catalog", url: window.location.href }, document.title, window.location.href);
            }
        });
    </script>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
            
<?php pageBuilder::buildFooter(); ?>



        
        </div></div>
    </div>
    
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    

<script type="text/javascript">
//<![CDATA[
$(function() { RobloxEventManager.triggerEvent('rbx_evt_newuser', {}); });//]]>
</script>
</form>
    
    
    
    <div id="InstallationInstructions" class="" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                    <span class="icon-close simplemodal-close"></span>
                    <h3>Thanks for playing ROBLOX</h3>
            </div>
            <div class="ph-installinstructions-body">


        <div class="ph-install-step ph-installinstructions-step1-of4">
            <h1>1</h1>
            <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
            <img width="230" height="180" src="/images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step2-of4">
            <h1>2</h1>
            <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
            <img width="230" height="180" src="/images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step3-of4">
            <h1>3</h1>
            <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
            <img width="230" height="180" src="/images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png"/>
        </div>
        <div class="ph-install-step ph-installinstructions-step4-of4">
            <h1>4</h1>
            <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
            <div class="VisitButton VisitButtonContinueGLI">
                <a class="btn btn-primary-lg disabled">Play</a>
            </div>
        </div>

            </div>
            <div class="small">
                The ROBLOX installer should download shortly. If it doesn’t, start the <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>


<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type="text/javascript" src="/js.rbxcdn.com/c55982be90aee588f799ba26ede12190.js"></script>

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
        
            
        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
            Roblox.Client.ResumeTimer(eval(continuation));
        }
        
</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-game-launch-interface-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-user-logged-in="<?php echo json_encode($loggedIn); ?>" data-os-name="Unknown" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
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
                <a href="/?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fcatalog%2FDefault.aspx"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="/newlogin?returnUrl=https%3A%2F%2Fwww.roblox.com%2Fcatalog%2FDefault.aspx">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
                 window.location = '/install/unsupported.aspx'; return false;
    }

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
        <div class="ConfirmationModalButtonContainer">
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


    
        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
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