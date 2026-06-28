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

<?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'ROBLOX Android App') === false && $loggedIn == true): // navbar shows if ur on the normal website and not the app ?>
<div id="header" class="navbar-fixed-top rbx-header" role="navigation">
<div class="container-fluid">
    <div class="rbx-navbar-header">
    <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">
        <span class="rbx-icon-nav-menu"></span>
        <div class="rbx-nav-notification hide rbx-font-xs" title="0"></div>
    </div>
    <div class="navbar-header">
        <!--2015 logo is commented-->
        <!--<a class="navbar-brand" href="/">
        <span class="logo"></span>
        </a>-->
        <a class="navbar-brand" href="/"><span class="logo logo-transitional"></span></a>
        <a class="navbar-brand" href="/">
            <span class="icon-logo"></span>
            <span class="icon-logo-r"></span>
        </a>
    </div>
    </div>
    <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
    <li>
        <a href="/games">Games</a>
    </li>
    <li>
        <a href="/catalog">Catalog</a>
    </li>
    <li>
        <a href="/develop">Develop</a>
    </li>
    <li>
        <a class="buy-robux" href="/upgrades/robux?ctx=nav">ROBUX</a>
    </li>
    </ul>
    <!--rbx-navbar-->
    <div id="navbar-universal-search" class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior="univeral-search" role="search">
    <div class="input-group rbx-input-group">
        <input id="navbar-search-input" class="form-control rbx-input-field" type="text" placeholder="Search" maxlength="120"/>
        <div class="input-group-btn rbx-input-group-btn">
        <button id="navbar-search-btn" class="rbx-input-addon-btn" type="submit">
            <span class="rbx-icon-nav-search"></span>
        </button>
        </div>
    </div>
    <ul data-toggle="dropdown-menu" class="rbx-dropdown-menu" role="menu">
        <li class="rbx-navbar-search-option selected" data-searchurl="/search/users?keyword=">
        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in People </span>
        </li>
        <li class="rbx-navbar-search-option" data-searchurl="/games/?Keyword=">
        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Games </span>
        </li>
        <li class="rbx-navbar-search-option" data-searchurl="/catalog/browse.aspx?CatalogContext=1&amp;amp;Keyword=">
        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Catalog </span>
        </li>
        <li class="rbx-navbar-search-option" data-searchurl="/groups/search.aspx?val=">
        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Groups </span>
        </li>
        <li class="rbx-navbar-search-option" data-searchurl="/develop/library?CatalogContext=2&amp;amp;Category=6&amp;amp;Keyword=">
        <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Library </span>
        </li>
    </ul>
    </div>
    <!--rbx-navbar-search-->
    <div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">
    <ul class="nav navbar-right rbx-navbar-icon-group">
        <li>
        <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-setting" data-viewport="#header">
            <span class="rbx-icon-nav-settings" id="nav-settings"></span>
            <span class="rbx-font-xs nav-setting-highlight hidden">0</span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-setting">
            <ul class="rbx-dropdown-menu" role="menu">
            <li>
                <a class="rbx-menu-item" href="/my/account"> Settings <span class="rbx-font-xs nav-setting-highlight hidden">0</span>
                </a>
            </li>
            <li>
                <a href="/Help/Builderman.aspx" target="_blank">Help</a>
            </li>
            <li>
                <a data-behavior="logout" data-bind="/authentication/logout">Logout</a>
            </li>
            </ul>
        </div>
        </li>
        <li>
        <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-tix" data-viewport="#header">
            <span class="rbx-icon-nav-tix" id="nav-tix"></span>
            <span class="rbx-text-navbar-right" id="nav-tix-amount"><?php echo $tickets;?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-tix">
            <ul class="rbx-dropdown-menu" role="menu">
            <li>
                <a href="/My/Money.aspx#/#Summary_tab" id="nav-tix-balance"><?php echo $tickets;?> Tickets</a>
            </li>
            <li>
                <a href="/my/money.aspx?tab=TradeCurrency">Trade Currency</a>
            </li>
            </ul>
        </div>
        </li>
        <li>
        <a id="nav-robux-icon" class="rbx-menu-item" data-toggle="popover" data-bind="popover-robux">
            <span class="rbx-icon-nav-robux" id="nav-robux"></span>
            <span class="rbx-text-navbar-right" id="nav-robux-amount"><?php echo $robux;?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-robux">
            <ul class="rbx-dropdown-menu" role="menu">
            <li>
                <a href="/My/Money.aspx#/#Summary_tab" id="nav-robux-balance"><?php echo $robux;?> ROBUX</a>
            </li>
            <li>
                <a href="/upgrades/robux?ctx=navpopover">Buy ROBUX</a>
            </li>
            </ul>
        </div>
        </li>
        <li class="rbx-navbar-right-search" data-toggle="toggle-search">
        <a class="rbx-menu-icon">
            <span class="rbx-icon-nav-search-white"></span>
        </a>
        </li>
    </ul>
    </div>
    <!-- navbar right-->
    <ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
    <li>
        <a href="/games">Games</a>
    </li>
    <li>
        <a href="/catalog">Catalog</a>
    </li>
    <li>
        <a href="/develop">Develop</a>
    </li>
    <li>
        <a class="buy-robux" href="/upgrades/robux?ctx=nav">ROBUX</a>
    </li>
    </ul>
    <!--rbx-navbar-->
</div>
</div>
<!-- LEFT NAV MENU -->
<div id="navigation" class="rbx-left-col" data-behavior="left-col">
<ul>
    <li class="rbx-lead">
    <a href="/user.aspx"><?php echo $username;?></a>
    </li>
    <li class="rbx-divider"></li>
</ul>
<div class="rbx-scrollbar" data-toggle="scrollbar" onselectstart="return false;">
    <ul>
    <li>
        <a href="/home" id="nav-home">
        <span class="rbx-icon-nav-home"></span>
        <span>Home</span>
        </a>
    </li>
    <li>
        <a href="/User.aspx" id="nav-profile">
        <span class="rbx-icon-nav-profile"></span>
        <span>Profile</span>
        </a>
    </li>
    <li>
        <a href="/my/messages/#!/inbox" id="nav-message" data-count="0">
        <span class="rbx-icon-nav-message"></span>
        <span>Messages</span>
        <span class="rbx-highlight" title="0"></span>
        </a>
    </li>
    <li>
        <a href="/friends.aspx" id="nav-friends" data-count="0">
        <span class="rbx-icon-nav-friends"></span>
        <span>Friends</span>
        <span class="rbx-highlight" title="0"></span>
        </a>
    </li>
    <li>
        <a href="/My/Character.aspx" id="nav-character">
        <span class="rbx-icon-nav-charactercustomizer"></span>
        <span>Character</span>
        </a>
    </li>
    <li>
        <a href="/My/Stuff.aspx" id="nav-inventory">
        <span class="rbx-icon-nav-inventory"></span>
        <span>Inventory</span>
        </a>
    </li>
    <li>
        <a href="/My/Money.aspx#/#TradeItems_tab" id="nav-trade">
        <span class="rbx-icon-nav-trade"></span>
        <span>Trade</span>
        </a>
    </li>
    <li>
        <a href="/My/Groups.aspx" id="nav-group">
        <span class="rbx-icon-nav-group"></span>
        <span>Groups</span>
        </a>
    </li>
    <li>
        <a href="/Forum/default.aspx" id="nav-forum">
        <span class="rbx-icon-nav-forum"></span>
        <span>Forum</span>
        </a>
    </li>
    <li>
        <a href="https://blog.roblox.com/" id="nav-blog">
        <span class="rbx-icon-nav-blog"></span>
        <span>Blog</span>
        </a>
    </li>
    <li class="rbx-upgrade-now">
        <a href="/Upgrades/BuildersClubMemberships.aspx?ctx=leftnav" class="rbx-btn-secondary-xs" id="upgrade-now-button">Upgrade Now</a>
    </li>
    </ul>
</div>
</div>
<div class="container-main    ">
<?php endif; ?>

<?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'ROBLOX Android App') === false && $loggedIn == false): ?>
<div id="wrap" class="wrap no-gutter-ads logged-out" data-gutter-ads-enabled="false">

<div id="header" class="navbar-fixed-top rbx-header" role="navigation">
    <div class="container-fluid">
        <div class="rbx-navbar-header">
            <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">

                <div class="notification-red hide" title="0">

                </div>

            </div>
            <div class="navbar-header">
                <!--2015 logo is commented-->
                <!--<a class="navbar-brand" href="/">
                <span class="logo"></span>
                </a>-->
                <a class="navbar-brand" href="/"><span class="logo logo-transitional"></span></a>
                <a class="navbar-brand" href="/">
                    <span class="icon-logo"></span>
                    <span class="icon-logo-r"></span>
                </a>
            </div>
        </div>
        <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
            <li>
                <a class="nav-menu-title" href="/games">Games</a>
            </li>
            <li>
                <a class="nav-menu-title" href="/catalog">Catalog</a>
            </li>
            <li>
                <a class="nav-menu-title" href="/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux nav-menu-title" href="/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
        <div id="navbar-universal-search" class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior="univeral-search" role="search">
            <div class="input-group">

                <input id="navbar-search-input" class="form-control input-field" type="text" placeholder="Search" maxlength="120"/>
                <div class="input-group-btn">
                    <button id="navbar-search-btn" class="input-addon-btn" type="submit">
                        <span class="icon-nav-search"></span>
                    </button>
                </div>
            </div>
            <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                <li class="rbx-navbar-search-option selected" data-searchurl="/games/?Keyword=">
                    <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Games</span>
                </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/search/users?keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in People</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/catalog/browse.aspx?CatalogContext=1&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Catalog</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/groups/search.aspx?val=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Groups</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Library</span>
                        </li>
            </ul>
        </div><!--rbx-navbar-search-->
        <div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">
                <ul class="nav navbar-right rbx-navbar-right-nav" data-display-opened="False">
                            <li>
                            <a id="head-login" class="rbx-navbar-login nav-menu-title" data-behavior="login" data-viewport="#header">Log In</a>
                            </li>
                                <div id="iFrameLogin" class="iFrameLogin popover bottom in" role="menu">
                                    <div class="arrow" style="left: 80%;"></div>
                                    <iframe id="iframe-login" name="iframe-nav-login" class="rbx-navbar-login-iframe" src="/Login/iFrameLogin.aspx?loginRedirect=False&amp;parentUrl=https%3a%2f%2fwww.roblox.com%2fgames" scrolling="no" frameborder="0" width="320"></iframe>
                                </div>
                    <li>
                        <a class="rbx-navbar-signup nav-menu-title" href="/newlogin?returnUrl=%2Fgames">Sign Up</a>
                    </li>
                    <li class="rbx-navbar-right-search" data-toggle="toggle-search">
                        <a class="rbx-menu-icon">
                            <span class="icon-nav-search-white"></span>
                        </a>
                    </li>
                </ul>
        </div><!-- navbar right-->
        <ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
            <li>
                <a class="nav-menu-title" href="/games">Games</a>
            </li>
            <li>
                <a class="nav-menu-title" href="/catalog/">Catalog</a>
            </li>
            <li>
                <a class="nav-menu-title" href="/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux nav-menu-title" href="/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
    </div>
</div>


<!-- LEFT NAV MENU -->
<?php endif; ?>
