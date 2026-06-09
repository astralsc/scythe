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
        header("Location: /login");
        exit();
    }
} else {
    header("Location: /login");
    exit();
}

$banner = $bannerEnabled; // announcment
$bannerLabel = $bannerText; // announcment
?>

<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8" ng-app="robloxApp">
    <![endif]-->
<!--[if gt IE 8]>
    <!-->
<html>
    <!--
        <![endif]-->
    <head>
    <!-- MachineID: WEB145 -->
    <title>Home - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ROBLOX Corporation"/>
    <meta name="description" content="User-generated MMO gaming site for kids, teens, and adults. Players architect their own worlds. Builders create free online games that simulate the real world. Create and play amazing 3D games. An online gaming cloud and distributed physics engine."/>
    <meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine"/>
    <meta name="apple-itunes-app" content="app-id=431946152"/>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/CSS/Base/CSS/FetchCSS?path=leanbase___f9e2a82b042c4b4f945b16e30fb19e87_m.css"/>
    <link rel="stylesheet" href="/CSS/Base/CSS/FetchCSS?path=page___0513ca5a00c9bdedff82380744b7def6_m.css"/>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        window.jQuery || document.write(" < script type = 'text/javascript'
            src = '/js/jquery/jquery-1.11.1.js' > < \/script>")
    </script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript">
        window.jQuery || document.write(" < script type = 'text/javascript'
            src = '/js/jquery/jquery-migrate-1.2.1.js' > < \/script>")
    </script>
    <script type="text/javascript" src="https://js.rbxcdn.com/fbb8598e3acc13fe8b4d8c1c5b676f2e.js.gzip"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.AdsHelper = Roblox.AdsHelper || {};
        Roblox.AdsHelper.toggleAdsSlot = function(slotId, GPTRandomSlotIdentifier) {
        var gutterAdsEnabled = false;
        if (gutterAdsEnabled) {
            googletag.display(GPTRandomSlotIdentifier);
            return;
        }
        if (typeof slotId !== 'undefined' && slotId && slotId.length > 0) {
            var slotElm = $("#" + slotId);
            if (slotElm.is(":visible")) {
            googletag.display(GPTRandomSlotIdentifier);
            } else {
            switch (slotId) {
                case "Skyscraper-Adp-Left":
                Roblox.AdsHelper.adLeftTemplate = slotElm.html();
                slotElm.empty();
                break;
                case "Skyscraper-Adp-Right":
                Roblox.AdsHelper.adRightTemplate = slotElm.html();
                slotElm.empty();
                break;
                case "Leaderboard-Abp":
                Roblox.AdsHelper.adLeaderboardTemplate = slotElm.html();
                slotElm.empty();
                break;
                case "GamePageAdDiv1":
                Roblox.AdsHelper.adGamePageAdDiv1Template = slotElm.html();
                slotElm.empty();
                break;
                case "GamePageAdDiv2":
                Roblox.AdsHelper.adGamePageAdDiv2Template = slotElm.html();
                slotElm.empty();
                break;
                case "GamePageAdDiv3":
                Roblox.AdsHelper.adGamePageAdDiv3Template = slotElm.html();
                slotElm.empty();
                break;
                case "ProfilePageAdDiv1":
                Roblox.AdsHelper.adProfilePageAdDiv1Template = slotElm.html();
                slotElm.empty();
                break;
                case "ProfilePageAdDiv2":
                Roblox.AdsHelper.adProfilePageAdDiv2Template = slotElm.html();
                slotElm.empty();
                break;
                default:
                return;
            }
            }
        }
        }
    </script>
    <script type="text/javascript">
        $(function() {
        Roblox.JSErrorTracker.initialize({
            'suppressConsoleError': true
        });
        });
    </script>
    <script type="text/javascript" src="https://cdns.gigya.com/js/gigya.js?apiKey=3_OsvmtBbTg6S_EUbwTPtbbmoihFY5ON6v6hbVrTbuqpBs7SyF_LQaJwtwKJ60sY1p"></script>
    <script>
        (function(a, b, c, d, e) {
        function f() {
            var a = b.createElement("script");
            a.async = !0;
            a.src = "https://radar.cedexis.com/1/18551/radar.js";
            b.body.appendChild(a)
        }
        /\bMSIE 6/i.test(a.navigator.userAgent) || (a[c] ? a[c](e, f, !1) : a[d] && a[d]("on" + e, f))
        })
        (window, document, "addEventListener", "attachEvent", "load");
    </script>
    <!--[if lt IE 9]>
                                <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                <![endif]-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11419793-1']);
        _gaq.push(['_setCampSourceKey', 'rbx_source']);
        _gaq.push(['_setCampMediumKey', 'rbx_medium']);
        _gaq.push(['_setCampContentKey', 'rbx_campaign']);
        _gaq.push(['_setDomainName', 'roblox.com']);
        _gaq.push(['b._setAccount', 'UA-486632-1']);
        _gaq.push(['b._setCampSourceKey', 'rbx_source']);
        _gaq.push(['b._setCampMediumKey', 'rbx_medium']);
        _gaq.push(['b._setCampContentKey', 'rbx_campaign']);
        _gaq.push(['b._setDomainName', 'roblox.com']);
        _gaq.push(['b._setCustomVar', 1, 'Visitor', 'Member', 2]);
        _gaq.push(['b._trackPageview']);
        _gaq.push(['c._setAccount', 'UA-26810151-2']);
        _gaq.push(['c._setDomainName', 'roblox.com']);
        (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https:https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer)\.roblox\.com|robloxlabs\.com)((\/[A-Za-z0-9-+&amp;amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm"></div>
    <script type="text/javascript" src="http://js.rbxcdn.com/2bd19c8fa2a972c94ed086573ec302cd.js.gzip"></script>
    <script type="text/javascript">
        $(function() {
        if (Roblox.EventStream) {
            Roblox.EventStream.InitializeEventStream("https://ecsv2.roblox.com/www/e.png");
        }
        });
    </script>
    </head>
    <body>
    <div id="fb-root"></div>
    <div class="wrap no-gutter-ads logged-in" data-gutter-ads-enabled="false">
        <?php pageBuilder::buildHeader(); ?>
        <script type="text/javascript">
            if (top.location != self.location) {
            top.location = self.location.href;
            }
        </script>
        <noscript>
            <div class="SystemAlert">
            <div class="rbx-alert-info" role="alert">Please enable Javascript to use all the features on this site.</div>
            </div>
        </noscript>
        
        <?php if (!empty($banner)): ?>
        <div class="SystemAlert"><div /*style="background-color: green;"*/ class="rbx-alert-info" role="alert"><?php echo $bannerLabel;?></div></div>
        <?php endif; ?>

        <div class="content  ">
            <div id="Skyscraper-Adp-Left" class="abp abp-container left-abp">
            <iframe allowtransparency="true" frameborder="0" height="612" scrolling="no" src="/userads/2" width="160" data-js-adtype="iframead"></iframe>
            </div>
            <div id="HomeContainer" class="row home-container" data-facebook-share="/facebook/share-character" data-update-status-url="/home/updatestatus" data-should-show-enable-two-step-verification-call-to-action="False">
            <div class="col-xs-12 home-header">
                <a href="/User.aspx" class="home-thumbnail-bust">
                <img alt="avatar" src="http://tr.rbxcdn.com/30DAY-AvatarHeadshot-C4DB8C0C7A0FE7473B9A6C49BC03DA31-Png/150/150/AvatarHeadshot/Png/noFilter"/>
                </a>
                <div class="home-header-content ">
                <h1>
                    <a href="/User.aspx">Hello, <?php echo $username;?>!</a>
                </h1>
                <span class="rbx-icon-tbc"></span>
                </div>
            </div>
            <?php
            /*<div class="col-xs-12 section home-friends">
                <div class="container-header">
                <h3>Friends (0)</h3>
                <a href="/friends.aspx#FriendsTab" class="rbx-btn-secondary-xs btn-more">See All</a>
                </div>
                <ul class="hlist friend-list">
                <li class="list-item friend">
                    <a href="/User.aspx?ID=72230447" class="friend-link" title="Alsinagirl22">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=72230447" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="Alsinagirl22" class="" src="http://t7.rbxcdn.com/da3c3de64bfee66f0903586002041238"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">Alsinagirl22</span>
                    <span class="friend-status rbx-icon-online" title="Website"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=26047499" class="friend-link" title="AUGUSTO210">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=26047499" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="AUGUSTO210" class="" src="http://t4.rbxcdn.com/ad51fa64b31ddde0bbb72a64dfd9ed84"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">AUGUSTO210</span>
                    <span class="friend-status rbx-icon-ingame" title="Catalog Heaven"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=62189829" class="friend-link" title="enderkiler101">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=62189829" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="enderkiler101" class="" src="http://t6.rbxcdn.com/6e8d1718a288239ce667b57d7a122330"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">enderkiler101</span>
                    <span class="friend-status rbx-icon-online" title="Website"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=28619945" class="friend-link" title="fabulousSWAT911">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=28619945" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="fabulousSWAT911" class="" src="http://t5.rbxcdn.com/e91d18aba5030ee1bd2e1df877017f7b"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">fabulousSWAT911</span>
                    <span class="friend-status rbx-icon-ingame" title="The Clone Factory!"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=67489313" class="friend-link" title="franniesmith">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=67489313" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="franniesmith" class="" src="http://t2.rbxcdn.com/15a394100f2ab12ea75ab8599d2abeab"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">franniesmith</span>
                    <span class="friend-status rbx-icon-ingame" title="My Little Pony Friendship is Magic Roleplay V.01"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=53156021" class="friend-link" title="haungboss1234">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=53156021" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="haungboss1234" class="" src="http://t3.rbxcdn.com/026e2a978f0212d29928011edba0da5a"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">haungboss1234</span>
                    <span class="friend-status rbx-icon-ingame" title="[Starbux Cafe] Hiring HR&amp;#39;S [Summer Update]"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=34856206" class="friend-link" title="imsonic3245">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=34856206" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="imsonic3245" class="" src="http://t0.rbxcdn.com/8ee2ad358ea9afcc351860a76b5dbf39"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">imsonic3245</span>
                    <span class="friend-status rbx-icon-ingame" title="My Little Pony FiM: TPP 2D RP"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=48259390" class="friend-link" title="JonasFlash">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=48259390" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="JonasFlash" class="" src="http://t2.rbxcdn.com/e40468d500d45fcb7fe8ee9863ef68a9"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">JonasFlash</span>
                    <span class="friend-status rbx-icon-ingame" title="Mini Golf! (NEW! Oasis Course)"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=53768126" class="friend-link" title="kingofworld342">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=53768126" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="kingofworld342" class="" src="http://t2.rbxcdn.com/da20d9f3a825166841de6714828f68be"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">kingofworld342</span>
                    <span class="friend-status rbx-icon-ingame" title="[Dragon Ball Online]"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=21613676" class="friend-link" title="madipoo1">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=21613676" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="madipoo1" class="" src="http://t1.rbxcdn.com/0dc61dd660dd17500ea919fdf6dcc7e4"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">madipoo1</span>
                    <span class="friend-status rbx-icon-ingame" title="Cube Eat Cube"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=85913334" class="friend-link" title="MerelyMod">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=85913334" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="MerelyMod" class="" src="http://t4.rbxcdn.com/61ebbf2606194e4a56e8486c2ead4550"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">MerelyMod</span>
                    <span class="friend-status rbx-icon-ingame" title="Catalog Heaven"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=91642777" class="friend-link" title="princesschristina132">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=91642777" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="princesschristina132" class="" src="http://t1.rbxcdn.com/c3efe20a5336bc3ec57855c5c19eb206"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">princesschristina132</span>
                    <span class="friend-status rbx-icon-ingame" title="Work at a Pizza Place"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=86527904" class="friend-link" title="sharkboy10077">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=86527904" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="sharkboy10077" class="" src="http://t2.rbxcdn.com/096e71a00fb83d6b7c0eeedb616badb4"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">sharkboy10077</span>
                    <span class="friend-status rbx-icon-ingame" title="Ultimate YouTube Tycoon | Grand Opening!"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=66215388" class="friend-link" title="Vien40">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=66215388" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="Vien40" class="" src="http://t6.rbxcdn.com/4492a7bb72b7491196a6211e0b5b878d"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">Vien40</span>
                    <span class="friend-status rbx-icon-ingame" title="Catalog Heaven"></span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=73666702" class="friend-link" title="360BeastMode">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=73666702" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="360BeastMode" class="" src="http://t3.rbxcdn.com/27013cd21d572bac50b4b0290daad57c"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">360BeastMode</span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=84555706" class="friend-link" title="Abel13245">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=84555706" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="Abel13245" class="" src="http://t3.rbxcdn.com/6dc9eaa2136e301bb93923ddb7e64fc5"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">Abel13245</span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=56754151" class="friend-link" title="adamdeath07">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=56754151" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="adamdeath07" class="" src="http://t7.rbxcdn.com/f4a876713b5298f5aabd2ca6d74afa09"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">adamdeath07</span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=88430056" class="friend-link" title="adampodmandavidpodm1">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=88430056" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="adampodmandavidpodm1" class="" src="http://t5.rbxcdn.com/a15e7aa55b9f57d13bec3fd7e66a6639"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">adampodmandavidpodm1</span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=78265702" class="friend-link" title="aiaoonnaphat">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=78265702" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="aiaoonnaphat" class="" src="http://t2.rbxcdn.com/266d1fab5eb558e190b3c48816b8dca5"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">aiaoonnaphat</span>
                    </a>
                </li>
                <li class="list-item friend">
                    <a href="/User.aspx?ID=79388622" class="friend-link" title="alexgummybear1715">
                    <span class="friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=79388622" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="alexgummybear1715" class="" src="http://t4.rbxcdn.com/6f03393da45166fc17fa85627c4a9652"/>
                    </span>
                    <span class="friend-name rbx-text-overflow">alexgummybear1715</span>
                    </a>
                </li>
                </ul>
            </div>*/
            ?>
            <?php
            echo('
            <div id="recently-visited-places" class="col-xs-12 container-list home-games">
                <div class="container-header">
                <h3>Recently Played</h3>
                <a href="/games?sortFilter=6" class="rbx-btn-secondary-xs btn-more">See All</a>
                </div>
                <ul class="hlist game-list">
                <li class="list-item game">
                    <a href="/games/189707/Natural-Disaster-Survival" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t6.rbxcdn.com/aec609e68d5248ff9b4612b9ca73f8e9" alt="Natural Disaster Survival" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t6.rbxcdn.com/aec609e68d5248ff9b4612b9ca73f8e9&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="Natural Disaster Survival" ng-non-bindable>Natural Disaster Survival </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 999 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="17" data-downvotes="4" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">4</div>
                        <div class="up-votes-count rbx-font-xs">17</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=80254">Stickmasterluke</cite>
                    </span>
                    </a>
                </li>
                </ul>
            </div>
            ')
            ?>
            <?php
            /*<div id="my-favorties-games" class="col-xs-12 container-list home-games">
                <div class="container-header">
                <h3>My Favorites</h3>
                <a href="/games?sortFilter=5" class="rbx-btn-secondary-xs btn-more">See All</a>
                </div>
                <ul class="hlist game-list">
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=206640076&amp;amp;Position=1&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t7.rbxcdn.com/4a94334038e54dada6c1eaa54cf92b16" alt="ROBLOX Deathrun" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t7.rbxcdn.com/4a94334038e54dada6c1eaa54cf92b16&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="ROBLOX Deathrun" ng-non-bindable> ROBLOX Deathrun </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 1,761 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="14509" data-downvotes="1732" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">1,732</div>
                        <div class="up-votes-count rbx-font-xs">14,509</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/Groups/group.aspx?gid=1251857">Team Deathrun</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=152691313&amp;amp;Position=2&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t0.rbxcdn.com/fbad7718ccaaa743edbcef19c98c6662" alt="R.I.P Windows XP " thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t0.rbxcdn.com/fbad7718ccaaa743edbcef19c98c6662&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="R.I.P Windows XP " ng-non-bindable> R.I.P Windows XP </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 1 player online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="426" data-downvotes="31" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">31</div>
                        <div class="up-votes-count rbx-font-xs">426</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=7259154">Resyncable</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=280591759&amp;amp;Position=3&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t3.rbxcdn.com/9a70d391b52a05ff7aa9d385d2abd923" alt="Monday Foodline Restaurant V1" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t3.rbxcdn.com/9a70d391b52a05ff7aa9d385d2abd923&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="Monday Foodline Restaurant V1" ng-non-bindable> Monday Foodline Restaurant V1 </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 0 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="1" data-downvotes="1" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">1</div>
                        <div class="up-votes-count rbx-font-xs">1</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/Groups/group.aspx?gid=2635007">Monday Foodline&#174;</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=9689581&amp;amp;Position=4&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t6.rbxcdn.com/3b2ffb3b7e1beaeb06718615d8226175" alt="ROBLOX High School" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t6.rbxcdn.com/3b2ffb3b7e1beaeb06718615d8226175&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="ROBLOX High School" ng-non-bindable> ROBLOX High School </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 1,899 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="55957" data-downvotes="6039" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">6,039</div>
                        <div class="up-votes-count rbx-font-xs">55,957</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=2364169">Cindering</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=192742001&amp;amp;Position=5&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t1.rbxcdn.com/dcc7c5e67666254fd4c08535ab14becf" alt="NEW MAP! Snow-TASTROPHE" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t1.rbxcdn.com/dcc7c5e67666254fd4c08535ab14becf&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="NEW MAP! Snow-TASTROPHE" ng-non-bindable> NEW MAP! Snow-TASTROPHE </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 7 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="2464" data-downvotes="682" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">682</div>
                        <div class="up-votes-count rbx-font-xs">2,464</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=68728334">Perhapz</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=5&amp;amp;PlaceId=253194221&amp;amp;Position=6&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t7.rbxcdn.com/f3a155210c05288be740b2bcc8d66e3f" alt="TNT Rush" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t7.rbxcdn.com/f3a155210c05288be740b2bcc8d66e3f&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="TNT Rush" ng-non-bindable> TNT Rush </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 388 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="11824" data-downvotes="1866" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">1,866</div>
                        <div class="up-votes-count rbx-font-xs">11,824</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/Groups/group.aspx?gid=2524737">Red Penguin Productions</cite>
                    </span>
                    </a>
                </li>
                </ul>
            </div>*/
            ?>
            <?php
            /*<div id="friend-activity" class="col-xs-12 container-list home-games">
                <div class="container-header">
                <h3>Friend Activity</h3>
                <a href="/games?sortFilter=17" class="rbx-btn-secondary-xs btn-more">See All</a>
                </div>
                <ul class="hlist game-list">
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=292762927&amp;amp;Position=1&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t1.rbxcdn.com/4e8d85014abf60843aea928296583e3d" alt="Ultimate YouTube Tycoon | Grand Opening!" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t1.rbxcdn.com/4e8d85014abf60843aea928296583e3d&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="Ultimate YouTube Tycoon | Grand Opening!" ng-non-bindable> Ultimate YouTube Tycoon | Grand Opening! </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 120 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="74" data-downvotes="66" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">66</div>
                        <div class="up-votes-count rbx-font-xs">74</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=19305571">PureTrading</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=253293579&amp;amp;Position=2&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t4.rbxcdn.com/0670fac00a3194bbdb47ebfc182557fe" alt="My Little Pony FiM: TPP 2D RP" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t4.rbxcdn.com/0670fac00a3194bbdb47ebfc182557fe&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="My Little Pony FiM: TPP 2D RP" ng-non-bindable> My Little Pony FiM: TPP 2D RP </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 205 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="1114" data-downvotes="220" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">220</div>
                        <div class="up-votes-count rbx-font-xs">1,114</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/Groups/group.aspx?gid=851605">The Pony Project</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=266723523&amp;amp;Position=3&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t5.rbxcdn.com/4471e1b15d1ae86446f315ad19160286" alt="The Clone Factory!" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t5.rbxcdn.com/4471e1b15d1ae86446f315ad19160286&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="The Clone Factory!" ng-non-bindable> The Clone Factory! </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 2,345 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="3711" data-downvotes="650" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">650</div>
                        <div class="up-votes-count rbx-font-xs">3,711</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=51204359">IAmTheRolo</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=196289686&amp;amp;Position=4&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t3.rbxcdn.com/69e0942e6860c8d80bc0fc4fef0188a6" alt="I HAVE NO IDEA WHAT I AM DOING" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t3.rbxcdn.com/69e0942e6860c8d80bc0fc4fef0188a6&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="I HAVE NO IDEA WHAT I AM DOING" ng-non-bindable> I HAVE NO IDEA WHAT I AM DOING </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 0 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="72" data-downvotes="46" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">46</div>
                        <div class="up-votes-count rbx-font-xs">72</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=1572288">Webspace</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=58329856&amp;amp;Position=5&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t4.rbxcdn.com/a14233c456cbd3fc057c1cba3846463b" alt="My Little Pony Friendship is Magic Roleplay V.01" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t4.rbxcdn.com/a14233c456cbd3fc057c1cba3846463b&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="My Little Pony Friendship is Magic Roleplay V.01" ng-non-bindable> My Little Pony Friendship is Magic Rolep </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 24 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="305" data-downvotes="72" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">72</div>
                        <div class="up-votes-count rbx-font-xs">305</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=5948165">Porkate</cite>
                    </span>
                    </a>
                </li>
                <li class="list-item game">
                    <a href="/games/refer?SortFilter=17&amp;amp;PlaceId=202195974&amp;amp;Position=6&amp;amp;PageType=Home" class="game-item">
                    <span class="game-thumb-content">
                        <span class="game-thumb-wrapper">
                        <img class="game-thumb" src="http://t7.rbxcdn.com/3117b1779d3e2276bb1a79e1de8ccd6d" alt="Mini Golf! (NEW! Oasis Course)" thumbnail="{&quot;Final&quot;:true,&quot;Url&quot;:&quot;http://t7.rbxcdn.com/3117b1779d3e2276bb1a79e1de8ccd6d&quot;,&quot;RetryUrl&quot;:null}" image-retry/>
                        </span>
                    </span>
                    <span class="rbx-game-title rbx-text-overflow" title="Mini Golf! (NEW! Oasis Course)" ng-non-bindable> Mini Golf! (NEW! Oasis Course) </span>
                    <span class="rbx-game-text-notes rbx-font-xs"> 72 Players Online </span>
                    <span class="rbx-votes">
                        <div class="vote-bar">
                        <div class="thumbs-up">
                            <span class="rbx-icon-thumbs-up"></span>
                        </div>
                        <div class="voting-container" data-upvotes="4815" data-downvotes="907" data-voting-processed="false">
                            <div class="background "></div>
                            <div class="votes"></div>
                            <div class="mask">
                            <div class="segment seg-one"></div>
                            <div class="segment seg-two"></div>
                            <div class="segment seg-three"></div>
                            <div class="segment seg-four"></div>
                            </div>
                        </div>
                        <div class="thumbs-down">
                            <span class="rbx-icon-thumbs-down"></span>
                        </div>
                        </div>
                        <div class="vote-counts">
                        <div class="down-votes-count rbx-font-xs">907</div>
                        <div class="up-votes-count rbx-font-xs">4,815</div>
                        </div>
                    </span>
                    <span class="rbx-developer rbx-font-xs"> by <cite class="rbx-link-sm" data-href="/User.aspx?ID=25525981">Widgeon</cite>
                    </span>
                    </a>
                </li>
                </ul>
            </div>*/
            ?>
            <div class="col-xs-12 col-sm-6 home-right-col">
                <div class="section">
                <div class="section-header">
                    <h3>Blog News</h3>
                    <a href="https://blog.roblox.com/" class="rbx-btn-control-xs btn-more">See More</a>
                </div>
                <ul class="blog-news">
                    <?php
                    /*<li class="news">
                    <span class="rbx-icon-page"></span>
                    <span class="news-link">
                        <a href="https://blog.roblox.com/2015/09/get-free-hats-win-prizes-in-the-endless-summer-camp-out/" ref="news-article" class="roblox-interstitial rbx-link rbx-article-title">Get Free Hats &amp; Win Prizes in the Endless Summer Camp Out!</a>
                    </span>
                    </li>
                    <li class="news">
                    <span class="rbx-icon-page"></span>
                    <span class="news-link">
                        <a href="https://blog.roblox.com/2015/09/new-profile-pages-add-new-features-for-interacting-with-friends/" ref="news-article" class="roblox-interstitial rbx-link rbx-article-title">New Profile Pages Add New Features for Interacting With Friends</a>
                    </span>
                    </li>*/
                    ?>
                </ul>
                </div>
                <div id="FacebookConnectCard" class="section">
                <h3> CONNECT WITH FACEBOOK </h3>
                <p>Link your ROBLOX account with your Facebook account to let your Facebook friends see what you're doing on ROBLOX!</p>
                <div id="connect-facebook">
                    <div id="SocialIdentitiesInformation" data-rbx-login="/social/notify-login" data-rbx-update="/social/update-info" data-rbx-disconnect="/social/disconnect" data-rbx-login-redirect-url="/social/postlogin" data-user-is-authenticated></div>
                    <div class="connect-button" data-rbx-provider="facebook" style="background-image:url('https://cdns3.gigya.com/gs/GetSprite.ashx?path=%2FHTMLLogin%2FFullLogo%2F%5Bfacebook%5D_30.png%7C78%2C30');width:78px;height:30px;background-repeat:no-repeat"></div>
                    <div class="disconnect-link" data-rbx-provider="facebook"></div>
                    <div class="nickname"></div>
                </div>
                </div>
            </div>
            <!-- .home-right-col -->
            <div class="col-xs-12 col-sm-6 home-left-col">
                <div class="section">
                <div class="section-header">
                    <h3>My Feed</h3>
                </div>
                <div class="rbx-form-horizontal" id="statusForm" role="form">
                    <div class="rbx-form-group">
                    <input class="form-control rbx-input-field" id="txtStatusMessage" maxlength="254" placeholder="What are you up to?" value=""/>
                    <p class="rbx-control-label">Status update failed.</p>
                    </div>
                    <a type="button" class="rbx-btn-primary-sm" id="shareButton">Share</a>
                    <img id="loadingImage" class="share-login" style="display: none" alt="Sharing..." src="http://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif" height="17" width="48"/>
                </div>
                <ul class="vlist feeds">
                    <?php
                    /*<li class="list-item">
                    <a href="/My/Groups.aspx?gid=950346" class="list-header">
                        <img class="header-thumb" src="http://t2.rbxcdn.com/4fe13f8a00431903c982c76896b846f0"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=950346">Frapp&#233;&#174;</a>
                        <div class="feedtext linkify">"[INTERVIEWS] Now! Head down to the Interview Center for your chance to work here! AR-PC only, please. http://www.roblox.com/games/180870972/Frappe-Interview-Center"</div> (posted by <a href="/User.aspx?ID=16044806" class="rbx-title">shipIeydonuts</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 2:30 PM</span>
                        <a href="/abusereport/Feed?id=106680976&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=812735" class="list-header">
                        <img class="header-thumb" src="http://t5.rbxcdn.com/6cf6a89cf0671f421438be9f4a74a131"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=812735">The Tiberium Empire</a>
                        <div class="feedtext linkify">"[A] I'll host it next week. 3 PM EST SUNDAY so clear up your plans."</div> (posted by <a href="/User.aspx?ID=17995986" class="rbx-title">lnelson2</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 1:32 PM</span>
                        <a href="/abusereport/Feed?id=106677852&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1016598" class="list-header">
                        <img class="header-thumb" src="http://t0.rbxcdn.com/add78199593570864bf9e2b7ead61c15"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1016598">T.G.I. Friday&amp;#39;s&amp;#174;</a>
                        <div class="feedtext linkify">"Trainings| Hosted by Emptygeast123, over. Thanks for coming!"</div> (posted by <a href="/User.aspx?ID=16669226" class="rbx-title">emptygeast123</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 1:28 PM</span>
                        <a href="/abusereport/Feed?id=106677615&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/User.aspx?id=57081559" class="list-header">
                        <span class="" data-3d-url="/avatar-thumbnail-3d/json?userId=57081559" data-js-files="http://js.rbxcdn.com/47e6e85800c4ed3c4eef848c077575a9.js.gzip">
                        <img alt="nutcraks" class="header-thumb" src="http://t6.rbxcdn.com/aabc8d0aac24541b68a548f354131b99"/>
                        </span>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/User.aspx?ID=57081559" class="rbx-title">nutcraks</a>
                        <div class="feedtext linkify">"I'm getting ready 4 season 2 of roblox activision cup series division 2!"</div>
                        </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 12:56 PM</span>
                        <a href="/abusereport/Feed?id=106677049&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1036618" class="list-header">
                        <img class="header-thumb" src="http://t7.rbxcdn.com/9814535e93a2de6c7a9f7609eff0cff8"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1036618">- easyJet™ -</a>
                        <div class="feedtext linkify">"|MESSAGE| We got admin abused, we have fixed it, please post your previous ranks in the group wall. I will slowly re-promote everyone."</div> (posted by <a href="/User.aspx?ID=76058844" class="rbx-title">GamerboyLV</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 12:22 PM</span>
                        <a href="/abusereport/Feed?id=106674102&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=2601543" class="list-header">
                        <img class="header-thumb" src="http://t6.rbxcdn.com/de5f7519dd9fa6ec31b700f0ccdaaa1b"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=2601543">Korean Airlines™</a>
                        <div class="feedtext linkify">"[Flight] Today will be the last flight with our A330 and it will also be our COO, iiDextrousSafe's last flight. Be sure to wish him good luck in the future! The flight will be at 3:30 PM EST at Newcastle."</div> (posted by <a href="/User.aspx?ID=52049448" class="rbx-title">canadianspirit1</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 12:02 PM</span>
                        <a href="/abusereport/Feed?id=106673101&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1127093" class="list-header">
                        <img class="header-thumb" src="http://t7.rbxcdn.com/ea15a38762b80c1d2a18ed178d7a4097"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1127093">Roblox High School Fan Club</a>
                        <div class="feedtext linkify">"Another friendly reminder during this eventful weekend - don't visit any links that claim to have free Robux, BC, or "leaked sale items" - they are all fake scams! Report users who post these, and keep your account safe :)"</div> (posted by <a href="/User.aspx?ID=2364169" class="rbx-title">Cindering</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/6/2015 at 3:13 AM</span>
                        <a href="/abusereport/Feed?id=106657441&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=950346" class="list-header">
                        <img class="header-thumb" src="http://t2.rbxcdn.com/4fe13f8a00431903c982c76896b846f0"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=950346">Frapp&#233;&#174;</a>
                        <div class="feedtext linkify">"[INTERVIEWS] Server-locked! Sorry if you couldn't make it or didn't make i,there's always a next time.Why not go to the cafe to cheer you up?"</div> (posted by <a href="/User.aspx?ID=58558990" class="rbx-title">denskie19</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 5:45 PM</span>
                        <a href="/abusereport/Feed?id=106638604&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1016598" class="list-header">
                        <img class="header-thumb" src="http://t0.rbxcdn.com/add78199593570864bf9e2b7ead61c15"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1016598">T.G.I. Friday&amp;#39;s&amp;#174;</a>
                        <div class="feedtext linkify">"Training | Over"</div> (posted by <a href="/User.aspx?ID=80441176" class="rbx-title">Wyrschip2</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 5:29 PM</span>
                        <a href="/abusereport/Feed?id=106637778&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1036618" class="list-header">
                        <img class="header-thumb" src="http://t7.rbxcdn.com/9814535e93a2de6c7a9f7609eff0cff8"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1036618">- easyJet™ -</a>
                        <div class="feedtext linkify">"|Flight| The flight was going well until somethings....(We'll host a another flight later on) [Interviews] Interviews are being held right now!"</div> (posted by <a href="/User.aspx?ID=18112155" class="rbx-title">BtwItsKim</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 5:18 PM</span>
                        <a href="/abusereport/Feed?id=106637225&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=812735" class="list-header">
                        <img class="header-thumb" src="http://t5.rbxcdn.com/6cf6a89cf0671f421438be9f4a74a131"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=812735">The Tiberium Empire</a>
                        <div class="feedtext linkify">"[T] Report for Training at Xenon http://www.roblox.com/games/253486633/TTE-XENON-Training-Facility"</div> (posted by <a href="/User.aspx?ID=52264421" class="rbx-title">SVN22</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:56 PM</span>
                        <a href="/abusereport/Feed?id=106632704&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=950346" class="list-header">
                        <img class="header-thumb" src="http://t2.rbxcdn.com/4fe13f8a00431903c982c76896b846f0"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=950346">Frapp&#233;&#174;</a>
                        <div class="feedtext linkify">"[Interviews] S-Locked. If you couldn't make it maybe next time. Why not go down to the cafe to get a latte?"</div> (posted by <a href="/User.aspx?ID=25664593" class="rbx-title">SpiffyAlden</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:45 PM</span>
                        <a href="/abusereport/Feed?id=106632124&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1016598" class="list-header">
                        <img class="header-thumb" src="http://t0.rbxcdn.com/add78199593570864bf9e2b7ead61c15"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1016598">T.G.I. Friday&amp;#39;s&amp;#174;</a>
                        <div class="feedtext linkify">"Interviews | Over"</div> (posted by <a href="/User.aspx?ID=80441176" class="rbx-title">Wyrschip2</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:31 PM</span>
                        <a href="/abusereport/Feed?id=106631246&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1036618" class="list-header">
                        <img class="header-thumb" src="http://t7.rbxcdn.com/9814535e93a2de6c7a9f7609eff0cff8"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1036618">- easyJet™ -</a>
                        <div class="feedtext linkify">"|Flight| We're hosting a flight towards Spain (Barcelona) at Princess Julianna airport right now! http://www.roblox.com/games/289791310/easyJet-Princess-Juliana-International-Airport"</div> (posted by <a href="/User.aspx?ID=42147651" class="rbx-title">Mrblingbling088</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:30 PM</span>
                        <a href="/abusereport/Feed?id=106631224&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=2601543" class="list-header">
                        <img class="header-thumb" src="http://t6.rbxcdn.com/de5f7519dd9fa6ec31b700f0ccdaaa1b"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=2601543">Korean Airlines™</a>
                        <div class="feedtext linkify">"[FLIGHT] Tomorrow at Newcastle at 3:00 PM EST. It will be our last flight with the old A330 before we introduce the new one! [QOTD] Whats your favorite soda?"</div> (posted by <a href="/User.aspx?ID=52049448" class="rbx-title">canadianspirit1</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:21 PM</span>
                        <a href="/abusereport/Feed?id=106630681&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1016598" class="list-header">
                        <img class="header-thumb" src="http://t0.rbxcdn.com/add78199593570864bf9e2b7ead61c15"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1016598">T.G.I. Friday&amp;#39;s&amp;#174;</a>
                        <div class="feedtext linkify">"Training | Over. Interviews | Hosted by Wyrschip2, Unslocking in 10 minutes!"</div> (posted by <a href="/User.aspx?ID=80441176" class="rbx-title">Wyrschip2</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:16 PM</span>
                        <a href="/abusereport/Feed?id=106630391&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=1036618" class="list-header">
                        <img class="header-thumb" src="http://t7.rbxcdn.com/9814535e93a2de6c7a9f7609eff0cff8"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=1036618">- easyJet™ -</a>
                        <div class="feedtext linkify">"|Flight| We're hosting a flight towards Spain (Barcelona) at Princess Julianna airport right now!"</div> (posted by <a href="/User.aspx?ID=42147651" class="rbx-title">Mrblingbling088</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 3:15 PM</span>
                        <a href="/abusereport/Feed?id=106630387&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=950346" class="list-header">
                        <img class="header-thumb" src="http://t2.rbxcdn.com/4fe13f8a00431903c982c76896b846f0"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=950346">Frapp&#233;&#174;</a>
                        <div class="feedtext linkify">"[INTERVIEWS] Over! Congratulations to those who passed, sorry to those who didn't. Why not go to the cafe for a Cotton Candy Frappe?"</div> (posted by <a href="/User.aspx?ID=52981960" class="rbx-title">ashleyscarf</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 2:16 PM</span>
                        <a href="/abusereport/Feed?id=106627047&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                    <li class="list-item">
                    <a href="/My/Groups.aspx?gid=2601543" class="list-header">
                        <img class="header-thumb" src="http://t6.rbxcdn.com/de5f7519dd9fa6ec31b700f0ccdaaa1b"/>
                    </a>
                    <div class="list-body">
                        <p class="list-content">
                        <a href="/My/Groups.aspx?gid=2601543">Korean Airlines™</a>
                        <div class="feedtext linkify">"[FLIGHT] Cancelled, I had something coming up, sorry. [QOTD] What is you're favorite Soda?"</div> (posted by <a href="/User.aspx?ID=43770327" class="rbx-title">JohnAtGaming</a>) </p>
                        <span class="rbx-text-notes rbx-font-sm">9/5/2015 at 2:10 PM</span>
                        <a href="/abusereport/Feed?id=106626719&amp;amp;redirectUrl=%2Fhome">
                        <span class="rbx-icon-report"></span>
                        </a>
                    </div>
                    </li>
                </ul>*/
                ?>
                </div>
            </div>
            </div>
            <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">
            <iframe allowtransparency="true" frameborder="0" height="612" scrolling="no" src="/userads/2" width="160" data-js-adtype="iframead"></iframe>
            </div>
        </div>
        </div>
        <div id="fb-root"></div>
        <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0&appId=e58f2110adf82c2c00e6ae41c665510c";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <?php pageBuilder::buildFooter(); ?>
        <script src="https://apis.google.com/js/platform.js"></script>
    </div>
    <div id="ChatContainer" class="chat-container">
        <div id="friend_dock_chattemplate" style="display: none;">
        <div id="CHATUSERID_friend_dock_chatbox" userid="CHATUSERID" class="friend_dock_chatbox">
            <div class="friend_dock_chatbox_titlebar chat-header-blink-off" userid="CHATUSERID">
            <div class="friend_dock_chatbox_username">
                <a style="color: #fff" class="friend_dock_chatbox_username_display" href="/user.aspx?id=CHATUSERID">CHATUSERNAME</a>
                <a class="friend_dock_chatbox_username_abuse" style="color: #fff; font-size: 9px; line-height: 14px; cursor: pointer" alt="Report Abuse" href="#" onclick=" ChatBar.ReportAbuse(CHATUSERID); return false; ">(Report)</a>
            </div>
            <div class="friend_dock_chatbox_closebutton">
                <a href="#" style="color: #fff" onclick=" ChatBar.CloseChat($(this).parents('.friend_dock_chatbox').filter(':first'));return false; ">-</a>
            </div>
            </div>
            <div class="friend_dock_chatbox_currentlocation" style="margin: 10px; height: 18px"></div>
            <div id="CHATUSERID_friend_dock_chatbox_chat" class="friend_dock_chatbox_chat"></div>
            <textarea class="friend_dock_chatbox_entry" maxlength="255"></textarea>
        </div>
        </div>
        <div id="friend_dock_friendtemplate" style="display: none;">
        <div id="UID_CURRTAB_friend" userid="UID" username="USERNAME" class="friend_dock_friend">
            <div id="UID_CURRTAB_onlinestatus" class="friend_dock_onlinestatus"></div>
            <div id="UID_CURRTAB_offlinestatus" class="friend_dock_offlinestatus"></div>
            <div id="UID_CURRTAB_dropdown" class="friendBarDropDown" userid="UID" username="USERNAME" style="display: none">
            <div id="UID_CURRTAB_dropdownbutton" class="friend-bar-dropdown-button"></div>
            <div id="UID_CURRTAB_dropdownlist" class="friendBarDropDownList">
                <ul>
                <li onclick=" Party.InviteUser('USERNAME'); " startpartydisplay>
                    <div>Invite To Party</div>
                </li>
                <li class="StartChat" onclick=" ChatBar.ToggleChat('UID', 'USERNAME'); " startchattingdisplay userid="UID">
                    <div>Start Chatting</div>
                </li>
                <li onclick=" window.location.href = '/user.aspx?id=UID'; ">
                    <div>View Profile</div>
                </li>
                <li class="EndChat" style="display: none" onclick=" ChatBar.RemoveActiveChat(this); " userid="UID">
                    <div>End Chat</div>
                </li>
                </ul>
            </div>
            </div>
            <img thumbnail_holder alt="" onclick=" ChatBar.ToggleChat('UID', 'USERNAME'); return false; " width="48" height="48" class="ActiveChatThumb"/>
            <div class="friend_dock_username">
            <span class="friend_dock_username_href">USERNAMETRUNCATED</span>
            </div>
        </div>
        </div>
        <div style="position: relative;">
        <div id="friend_dock_chatholder" style="display:none;"></div>
        <div id="party-container" style="display: none; margin-left: 10px; float: right; position: absolute;">
            <div id="partyMemberTemplate" style="display:none;height:32px">
            <div id="party_pendinguserid_UID" style="clear:both;">
                <dt style="position:relative;">
                <span id="UID_status" class="friend_dock_offlinestatus"></span> [PARTY_MEMBER_THUMBNAIL]
                </dt>
                <dd>
                <span>[PARTY_MEMBER_NAME]</span>&nbsp;&nbsp;&nbsp;
                <!--<span class="party-report-container"></span><span class="party-kick-container"></span>-->[PARTY_MEMBER_REPORT][PARTY_KICK_MEMBER]
                </dd>
            </div>
            </div>
            <script type="text/javascript" language="javascript">
            Party.CurrentUserID = <?php echo $userId;?>;
            Party.CurrentUserName = "<?php echo $username;?>";
            Party.ActiveView = "";
            Party.PollThreadAvailable = true;
            Party.FirstLoad = true;
            Party.PollIntervalTimer = null;
            Party.MaxPartySize = 6;
            Party.PlayEnabled = true;
            /*
                                                <sl:translate_json>*/
            Party.Resources = {
                areYouSureReport: 'Are you sure you would like to report ',
                report: "Report",
                kick: "Kick from party",
                pending: "Pending...",
                partyInvite: "Party Invite!",
                partyGameBlurb: "When the party leader joins a game, the rest of the party will be invited to follow",
                inviteInstructions: "Please type the name of the user you wish to invite",
                partyFull: "Your party is already full!",
                joinConfirm1: "The party leader has joined ",
                joinConfirm2: ".  Would you like to join?",
                joinConfirm3: "You will be removed from any game you might be playing.",
                enterUserName: 'Enter username'
            };
            /*</sl:translate_json>*/
            Party.SetGoogleAnalyticsCallback = function(placeId) {
                RobloxLaunch._GoogleAnalyticsCallback = function() {
                var isInsideRobloxIDE = 'website';
                if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                    isInsideRobloxIDE = 'Studio';
                };
                GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
                GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
                EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
                if (typeof Roblox.GamePlayEvents != 'undefined') {
                    Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
                }
                };
            }
            </script>
            <script type="text/javascript" language="javascript">
            try {
                $(function() {
                $(function() {
                    Party.ProcessPolledData(eval(({
                    "Error": "User not found in party"
                    })));
                    Party.OnPageLoad();
                });
                });
            } catch (ex) {}
            </script>
            <div class="party-window" id="party_none">
            <div id="party_none_title" class="title" onclick="Party.ToggleTab(false)">
                <span>Party</span>
                <div class="closeparty">-</div>
            </div>
            <div class="main">
                <div id="new_party">
                <p>You are not in a party. To create a party, just invite someone:</p>
                <p>
                    <input type="text" id="new_party_invite_name" class="party-invite-box" onkeydown="return Party.ProcessKey('new_party_invite_name',event)"/>
                    <input type="button" class="translate" onclick="Party.DoInvite('new_party_invite_name')" value="Invite"/>
                </p>
                </div>
                <div class="clear" id="new_party_clear"></div>
            </div>
            </div>
            <div class="party-window" id="party_loading" style="display:none;">
            <div id="party_loading_title" class="title" onclick="Party.ToggleTab(false)">
                <span>Party</span>
                <div class="closeparty">-</div>
            </div>
            <div class="main">
                <div>
                <p>Invitation sent.</p>
                <p>Creating party...</p>
                </div>
            </div>
            </div>
            <div class="party-window" id="party_pending" style="display:none;">
            <div id="party_pending_title" class="title" onclick="Party.ToggleTab(false)">
                <span>Party</span>
                <div class="closeparty">-</div>
            </div>
            <div class="main">
                <div id="invite-header">RobloTim wants to party with you!</div>
                <div class="members">
                <dl id="party_invite_list"></dl>
                </div>
                <div id="invite_status">
                <p>
                    <span>Waiting for Leader to play a game</span>
                </p>
                </div>
                <div class="party-invite-buttons">
                <div class="btn-primary btn-small">
                    <a href="#" class="party-btn-link" onclick="Party.AcceptInvite();return false;">Join Party</a>
                </div>
                <div class="btn-negative btn-small">
                    <a href="#" class="party-btn-link" onclick="Party.DeclineInvite();return false;">Ignore</a>
                </div>
                </div>
                <div class="clear" id="invite_clear"></div>
            </div>
            </div>
            <div class="party-window" id="party_my" style="display:none;">
            <div id="party_my_title" class="title" onclick="Party.ToggleTab(false)">
                <span>Party</span>
                <div class="closeparty">-</div>
            </div>
            <div class="main">
                <div class="members">
                <dl id="party_member_list"></dl>
                </div>
                <p id="party_invite_instructions">
                <span>
                    <input type="text" id="party_my_invite_name" class="party-invite-box" onkeydown="return Party.ProcessKey('party_my_invite_name',event)"/>
                    <input type="button" class="translate" onclick="Party.DoInvite('party_my_invite_name')" value="Invite"/>
                </span>
                </p>
                <div id="chat_messages"></div>
                <div id="chat_input">
                <textarea name="comments" rows="2" cols="27" id="comments" tabindex="4" title="comments"></textarea>
                </div>
                <div id="party-auto-follow-setting" style="padding: 5px; text-align: center">
                <input id="auto-follow-party-leader" type="checkbox"/>
                <label for="auto-follow-party-leader">Automatically follow party leader</label>
                <script type="text/javascript">
                    $("#auto-follow-party-leader").prop('checked', $.cookie('AutoFollowPartyLeader') != 'false');
                    $("#auto-follow-party-leader").on("click", function() {
                    // every time I join a party in the future, this cookie will determine whether or not I automatically follow the party leader
                    if (ChatBar && ChatBar.UseSubdomainlessCookies) {
                        $.cookie('AutoFollowPartyLeader', null, {
                        path: '/'
                        }); // clear old cookie, if it exists
                        $.cookie('AutoFollowPartyLeader', this.checked, {
                        domain: ChatBar.CookieDomain,
                        path: '/',
                        expires: 365
                        });
                    } else {
                        if (ChatBar && ChatBar.NewCookieRollbackEnabled) {
                        // delete the subdomainlesscookie, if we are rolling back
                        $.cookie('AutoFollowPartyLeader', null, {
                            domain: ChatBar.CookieDomain,
                            path: '/',
                            expires: 365
                        });
                        }
                        $.cookie('AutoFollowPartyLeader', this.checked, {
                        path: '/',
                        expires: 365
                        });
                    }
                    $.ajax({
                        method: "GET",
                        url: "/chat/party.ashx",
                        data: {
                        reqtype: "autoFollowPartyLeader"
                        },
                        crossDomain: true,
                        xhrFields: {
                        withCredentials: true
                        }
                    }).done();
                    });
                </script>
                </div>
                <div id="party_current_game">
                <table border="0" style="padding: 0px; margin: 0px; border: 0px;">
                    <tr style="padding: 0px; margin: 0px; border: 0px;">
                    <td style="padding: 0px; margin: 0px; border: 0px;">
                        <div id="party_game_thumb"></div>
                    </td>
                    <td style="padding: 0px; margin: 0px; border: 0px;">
                        <div id="party_game_name" style="float: right;"></div>
                        <span id="party_game_follow_me" class="btn-primary btn-small">
                        <a href="#" class="party-btn-link" onclick="Party.JoinGameWithParty();return false;">Follow</a>
                        </span>
                        <span class="btn-neutral btn-small">
                        <a href="#" class="party-btn-link" onclick="Party.DeclineInvite();return false;">Leave Party</a>
                        </span>
                    </td>
                    </tr>
                </table>
                </div>
                <div class="clear" id="leader_clear"></div>
            </div>
            </div>
        </div>
        <div class="clear"></div>
        </div>
        <div id="friend_dock_minimized_container" style="">
        <!--<div id="social-dock-tab" class="tab" style="float: right">
            <a id="minChatsTab" href="#">
            <span onclick=" ChatBar.ShowFriends();return false; ">
                <img src="http://images.rbxcdn.com/164e80229d83c8b6e55b1eb671887e54.png" width="9" height="9" style="border: none"/> Online </span>
            </a>
        </div>
        </div>-->
        <div id="friend_dock_container" style="display:none;">
        <div id="friend_dock_titlebar">
            <div class="tab-container" style="float: left;">
            <div class="tab">
                <a id="friends-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('friends-tab');return false; ">
                <span>Online Friends</span>
                </a>
            </div>
            <div class="tab">
                <a id="recents-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('recents-tab');return false; ">
                <span>Recent</span>
                </a>
            </div>
            <div class="tab">
                <a id="chats-tab" style="text-decoration: none" href="#" onclick=" ChatBar.TogglePanel('chats-tab');return false; ">
                <span>Chats</span>
                </a>
            </div>
            </div>
            <span class="tab-container" style="float: right;">
            <div class="tab" id="party-tab" onclick=" Party.ToggleTab(null); return false; ">
                <a href="#">Party</a>
            </div>
            <span class="friend_dock_chatsettings" style="display: none">
                <div style="padding: 10px">
                <div class="chat_settings_group_header">Chat Notifications:</div>
                <input type="radio" id="chat_settings_soundon" name="rdoNotifications" checked="checked"/>
                <b>All</b>
                <br/>
                <input type="radio" id="chat_settings_soundoff" name="rdoNotifications"/>
                <b>None</b>
                <br/>
                <div style="text-align: center; margin-top: 5px;">
                    <input type="button" onclick=" ChatBar.ApplySettings();$('.friend_dock_chatsettings').hide(); " value="Save">
                </div>
                </div>
            </span>
            <div id="social-settings-tab" class="tab">
                <a onclick=" $('.friend_dock_chatsettings').toggle(); return false " href="#">Settings</a>&amp;nbsp;&amp;nbsp;&amp;nbsp; <img src="http://images.rbxcdn.com/8a762994af1e122de8ac427005ac3d9b.png" onclick=" ChatBar.HideFriends();return false; " width="12" height="13" style="border: none; cursor: pointer" alt="Close chat"/>
            </div>
            </span>
        </div>
        <div id="friend_dock_thumb_container">
            <div id="friends-tab-dock-thumbnails" style="display: none">
            <div id="friends-tab-dock-thumbnails-empty">No results found. Find some friends <a href="/Browse.aspx">here</a>. </div>
            </div>
            <div id="best-friends-tab-dock-thumbnails" style="float: left; display: none">
            <div id="best-friends-tab-dock-thumbnails-empty">No results? Start off by <a href="/my/editfriends.aspx">adding some Best Friends.</a>
            </div>
            </div>
            <div id="recents-tab-dock-thumbnails" style="float: left; display: none">
            <div id="recents-tab-dock-thumbnails-empty">You have not had any recent interactions.</div>
            </div>
            <div id="chats-tab-dock-thumbnails" style="float: left; display: none">
            <div id="chats-tab-dock-thumbnails-empty">You are not currently chatting with anyone.</div>
            </div>
        </div>
        </div>
        <div id="jPlayerDiv"></div>
        <script type="text/javascript">
        if (typeof Roblox === "undefined") {
            Roblox = {};
        }
        if (typeof Roblox.Chat === "undefined") {
            Roblox.Chat = {};
        }
        Roblox.Chat.Resources = {
            //
            < sl: translate > reportConfirm: 'Are you sure you would like to report this user?',
            sendPersonalMessage1: 'This user may be offline.  They will receive your messages when they login, or you can send them a ',
            sendPersonalMessage2: 'Personal Message',
            loadingChat: 'Loading Chat',
            offline: 'Offline',
            online: 'Online',
            newMessage: 'New Message!',
            newMessages: 'New Messages!'
            //</sl:translate>
        };
        ChatBar.FriendsEnabled = 'True';
        ChatBar.PartyEnabled = 'True';
        ChatBar.MyUserName = "<?php echo $username;?>";
        ChatBar.MaxChatWindows = 4;
        ChatBar.ChatPollInterval = 2000;
        ChatBar.IdleChatPollInterval = 6000;
        ChatBar.FriendsPollInterval = 40000;
        ChatBar.RecentsPollInterval = 32000;
        ChatBar.ChatReceivedSoundFile = "/chat/sound/chatsound.mp3";
        ChatBar.ChatNotificationsSetting = 'All';
        ChatBar.DiagnosticsEnabled = false;
        ChatBar.jPlayerVersion = '2.9.2';
        ChatBar.SetGoogleAnalyticsCallback = function() {
            RobloxLaunch._GoogleAnalyticsCallback = function() {
            var isInsideRobloxIDE = 'website';
            if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
                isInsideRobloxIDE = 'Studio';
            };
            GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
            EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
            if (typeof Roblox.GamePlayEvents != 'undefined') {
                Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
            }
            };
        }
        $(function() {
            try {
            ChatBar.OnPageLoad();
            } catch (x) {}
        });
        </script>
    </div>
    <script type="text/javascript">
        function urchinTracker() {}
    </script>
    <div id="PlaceLauncherStatusPanel" style="display:none;width:300px" data-new-plugin-events-enabled="True" data-event-stream-for-plugin-enabled="True" data-event-stream-for-protocol-enabled="True" data-is-protocol-handler-launch-enabled="True" data-is-user-logged-in="<?php echo json_encode($loggedIn); ?>" data-os-name="Windows" data-protocol-name-for-client="roblox-player" data-protocol-name-for-studio="roblox-studio" data-protocol-url-includes-launchtime="true" data-protocol-detection-enabled="true">
        <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="http://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress"/>
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block"> Starting Roblox... </div>
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
        <div class="ph-modal-header"></div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_meatball.svg" width="90" height="90" alt="R"/>
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size"> ROBLOX is now loading. Get ready to play! </p>
            <div class="ph-startingdialog-spinner-row">
            <img src="http://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24"/>
            </div>
        </div>
        </div>
    </div>
    <div id="ProtocolHandlerAreYouInstalled" style="display:none;">
        <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_meatball.svg" width="90" height="90" alt="R"/>
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size"> You're moments away from getting into the game! </p>
            <div>
            <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton"> Download and Install ROBLOX </button>
            </div>
            <div class="rbx-small rbx-text-notes">
            <a href="https:https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
            </div>
        </div>
        </div>
    </div>
    <div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
        <p class="larger-font-size">
        <span class="rbx-icon-moreinfo"></span> Check <b>Remember my choice</b> and click <img src="http://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application"/> in the dialog box above to join games faster in the future!
        </p>
    </div>
    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv"> Gameplay sponsored by: </div>
        <div id="content">
        <video id="contentElement" style="width:0; height:0;"/>
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
        <script type="text/javascript">
            googletag.cmd.push(function() {
            googletag.defineSlot('/1015347/VideoPreroll', [300, 250], 'videoPrerollCompanionAd').addService(googletag.companionAds());
            googletag.enableServices();
            googletag.display('videoPrerollCompanionAd');
            });
        </script>
        </div>
        <div id="videoPrerollLoadingDiv"> Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span>
        <span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
        <div id="videoPrerollLoadingBar">
            <div id="videoPrerollLoadingBarCompleted"></div>
        </div>
        </div>
        <div id="videoPrerollJoinBC">
        <span>Get more with Builders Club!</span>
        <a href="/Upgrades/BuildersClubMemberships.aspx?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
        var videoPreRollDFP = Roblox.VideoPreRollDFP;
        if (videoPreRollDFP) {
            var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
            videoPreRollDFP.showVideoPreRoll = false;
            videoPreRollDFP.loadingBarMaxTime = 33000;
            videoPreRollDFP.videoLoadingTimeout = 11000;
            videoPreRollDFP.videoPlayingTimeout = 41000;
            videoPreRollDFP.videoLogNote = "BuildersClub";
            videoPreRollDFP.logsEnabled = true;
            videoPreRollDFP.excludedPlaceIds = "32373412";
            videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
            videoPreRollDFP.adTime = 15;
            videoPreRollDFP.isSwfPreloaderEnabled = true;
            videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
            customTargeting.userAge = "16";
            customTargeting.userGender = "Male";
            customTargeting.gameGenres = "";
            customTargeting.environment = "Production";
            customTargeting.adTime = "15";
            customTargeting.PLVU = false;
            $(videoPreRollDFP.checkEligibility);
        }
        });
    </script>
    <div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
        <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
        </div>
        <div class="Title"> Choose Your Character </div>
        <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>
        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
            <a href="/?returnUrl=%2Fhome">
                <div class="RevisedCharacterSelectSignup"></div>
            </a>
            <a class="HaveAccount" href="/newlogin?returnUrl=%2Fhome">I have an account</a>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript">
        function checkRobloxInstall() {
        return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
        }
    </script>
    <div id="InstallationInstructions" style="display:none;">
        <div class="ph-installinstructions">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
            <h3>Thanks for playing ROBLOX</h3>
        </div>
        <div class="ph-installinstructions-body">
            <div class="ph-install-step ph-installinstructions-step1-of4">
            <h1>1</h1>
            <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
            <img width="230" height="180" src="http://images.rbxcdn.com/22ff09393bb9dc4093b85439f420a531.png"/>
            </div>
            <div class="ph-install-step ph-installinstructions-step2-of4">
            <h1>2</h1>
            <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process. </p>
            <img width="230" height="180" src="http://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png"/>
            </div>
            <div class="ph-install-step ph-installinstructions-step3-of4">
            <h1>3</h1>
            <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX. </p>
            <img width="230" height="180" src="http://images.rbxcdn.com/1889460e8475fd0bc24c6b57992b31d4.png"/>
            </div>
            <div class="ph-install-step ph-installinstructions-step4-of4">
            <h1>4</h1>
            <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action! </p>
            <div class="VisitButton VisitButtonContinuePH">
                <a class="btn rbx-btn-primary-lg disabled">Play</a>
            </div>
            </div>
        </div>
        <div class="rbx-font-sm rbx-text-notes"> The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
        </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>
    <div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
    <iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>
    <script type="text/javascript" src="http://js.rbxcdn.com/02fc1bdbf2c1cdbfcd7c063c99c89ac0.js.gzip"></script>
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
        if (GoogleAnalyticsEvents) {
            GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Install Success']);
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
        RobloxLaunch._GoogleAnalyticsCallback = function() {
            var isInsideRobloxIDE = 'website';
            if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
            isInsideRobloxIDE = 'Studio';
            };
            GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
            GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
            EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin');
            if (typeof Roblox.GamePlayEvents != 'undefined') {
            Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
            }
        };
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
            <a href id="roblox-confirm-btn">
            <span></span>
            </a>
            <a href id="roblox-decline-btn">
            <span></span>
            </a>
        </div>
        <div class="ConfirmationModalFooter"></div>
        </div>
        <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};
        //
        < sl: translate > Roblox.Resources.GenericConfirmation = {
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
    <script type="text/javascript" src="http://js.rbxcdn.com/a3d0a08746c2f2408b1a1130640d9d0c.js.gzip"></script>
    <script type="text/javascript" src="http://js.rbxcdn.com/045483c002abdefee9f2e9598ac48d08.js.gzip"></script>
    <script type="text/javascript">
        Roblox.config.externalResources = [];
        Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/7f80c038811073416cc0c480b4cd735b.js.gzip';
        Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/94292889cb1b3e857d3b423f5c259701.js.gzip';
        Roblox.config.paths['Pages.Messages'] = 'https://js.rbxcdn.com/b123274ceba7c65d8415d28132bb2220.js.gzip';
        Roblox.config.paths['Resources.Messages'] = 'https://js.rbxcdn.com/6307f9bd9c09fa9d88c76291f3b68fda.js.gzip';
        Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/64f4ed4d4cf1c0480690bc39cbb05b73.js.gzip';
        Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/5cf0eb71249768c86649bbf0c98591b0.js.gzip';
        Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/556af22c86bce192fb12defcd4d2121c.js.gzip';
        Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/3ba7b7bc5faac4c7e7f1f42ae3af2434.js.gzip';
        Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/d689e41830fba6bc49155b15a6acd020.js.gzip';
        Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/45d46dd8e2bd7f10c17b42f76795150d.js.gzip';
        Roblox.config.paths['Widgets.SurveyModal'] = 'https://js.rbxcdn.com/56ad7af86ee4f8bc82af94269ed50148.js.gzip';
    </script>
    <script>
        Roblox.XsrfToken.setToken('hDq3LeL9Pm76');
    </script>
    <script>
        $(function() {
        Roblox.DeveloperConsoleWarning.showWarning();
        });
    </script>
    <script type="text/javascript">
        $(function() {
        Roblox.JSErrorTracker.initialize({
            'suppressConsoleError': true
        });
        });
    </script>
    <script type="text/javascript">
        $(function() {
        function trackReturns() {
            function dayDiff(d1, d2) {
            return Math.floor((d1 - d2) / 86400000);
            }
            if (!localStorage) {
            return false;
            }
            var cookieName = 'RBXReturn';
            var cookieOptions = {
            expires: 9001
            };
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};
            try {
            cookie = JSON.parse(cookieStr);
            } catch (ex) {
            // busted cookie string from old previous version of the code
            }
            try {
            if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                localStorage.setItem(cookieName, JSON.stringify({
                ts: new Date().toDateString()
                }));
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
        //
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
        };
    </script>
    <script type="text/javascript" src="http://js.rbxcdn.com/89b019cd9fe489276f2230250c461975.js.gzip"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="" data-cf-beacon="{&quot;version&quot;:&quot;2024.11.0&quot;,&quot;token&quot;:&quot;7215bb4be2ff4f34a124b3ab7d65e0d6&quot;,&quot;r&quot;:1,&quot;server_timing&quot;:{&quot;name&quot;:{&quot;cfCacheStatus&quot;:true,&quot;cfEdge&quot;:true,&quot;cfExtPri&quot;:true,&quot;cfL4&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfSpeedBrain&quot;:true},&quot;location_startswith&quot;:null}}" crossorigin="anonymous"></script>
</body>
</html>