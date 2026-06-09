<?php
http_response_code(200);
header('Content-Type: application/json');

include __DIR__ . '/../../config/db.php';

$user = null;
$userId = -1;
$username = 'unknown';
$displayname = 'unknown';
$email = '';

if (isset($_COOKIE['_ROBLOSECURITY'])) {
    $token = $_COOKIE['_ROBLOSECURITY'];

    $stmt = $DBReq->prepare("
        SELECT id, username, displayname, email
        FROM accounts
        WHERE roblosecurity = ?
    ");

    $stmt->bind_param("s", $token);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    $userId = $user['id'];
    $username = $user['username'];
    $displayname = $user['displayname'];
    $email = $user['email'];
}

$data = [
    'ChangeUsernameEnabled' => true,
    'IsAdmin' => false,
    'UserId' => $userId,
    'Name' => $username,
    'DisplayName' => $displayname,
    'IsEmailOnFile' => true,
    'IsEmailVerified' => true,
    'IsPhoneFeatureEnabled' => true,
    'RobuxRemainingForUsernameChange' => 563,
    'PreviousUserNames' => '',
    'UseSuperSafePrivacyMode' => false,
    'IsAppChatSettingEnabled' => true,
    'IsGameChatSettingEnabled' => true,
    'IsParentalSpendControlsEnabled' => true,
    'IsSetPasswordNotificationEnabled' => false,
    'ChangePasswordRequiresTwoStepVerification' => false,
    'ChangeEmailRequiresTwoStepVerification' => false,
    'UserEmail' => $email,
    'UserEmailMasked' => true,
    'UserEmailVerified' => true,
    'CanHideInventory' => true,
    'CanTrade' => true,
    'MissingParentEmail' => false,
    'IsUpdateEmailSectionShown' => true,
    'IsUnder13UpdateEmailMessageSectionShown' => false,
    'IsUserConnectedToFacebook' => false,
    'IsTwoStepToggleEnabled' => false,
    'AgeBracket' => 0,
    'UserAbove13' => true,
    'ClientIpAddress' => '203.222.149.91',
    'AccountAgeInDays' => 888,
    'IsPremium' => false,
    'IsBcRenewalMembership' => false,
    'PremiumFeatureId' => null,
    'HasCurrencyOperationError' => false,
    'CurrencyOperationErrorMessage' => null,
    'Tab' => null,
    'ChangePassword' => false,
    'IsAccountPinEnabled' => true,
    'IsAccountRestrictionsFeatureEnabled' => true,
    'IsAccountSettingsSocialNetworksV2Enabled' => false,
    'IsUiBootstrapModalV2Enabled' => true,
    'IsDateTimeI18nPickerEnabled' => true,
    'InApp' => false,
    'MyAccountSecurityModel' => [
        'IsEmailSet' => true,
        'IsEmailVerified' => true,
        'IsTwoStepEnabled' => true,
        'ShowSignOutFromAllSessions' => true,
        'TwoStepVerificationViewModel' => [
            'UserId' => 22429,
            'IsEnabled' => true,
            'CodeLength' => 0,
            'ValidCodeCharacters' => null,
        ],
    ],
    'ApiProxyDomain' => 'http://localhost/api.roblox.com',
    'AccountSettingsApiDomain' => 'http://localhost/accountsettings.roblox.com',
    'AuthDomain' => 'http://localhost',
    'IsDisconnectFacebookEnabled' => true,
    'IsDisconnectXboxEnabled' => true,
    'NotificationSettingsDomain' => 'http://localhost/notifications.roblox.com',
    'AllowedNotificationSourceTypes' => [
        'Test',
        'FriendRequestReceived',
        'FriendRequestAccepted',
        'PartyInviteReceived',
        'PartyMemberJoined',
        'ChatNewMessage',
        'PrivateMessageReceived',
        'UserAddedToPrivateServerWhiteList',
        'ConversationUniverseChanged',
        'TeamCreateInvite',
        'GameUpdate',
        'DeveloperMetricsAvailable',
        'GroupJoinRequestAccepted',
        'Sendr',
        'ExperienceInvitation',
    ],
    'AllowedReceiverDestinationTypes' => [
        'NotificationStream',
    ],
    'BlacklistedNotificationSourceTypesForMobilePush' => [],
    'MinimumChromeVersionForPushNotifications' => 50,
    'PushNotificationsEnabledOnFirefox' => false,
    'LocaleApiDomain' => 'http://localhost/locale.roblox.com',
    'HasValidPasswordSet' => true,
    'IsFastTrackAccessible' => false,
    'IsAgeDownEnabled' => true,
    'IsDisplayNamesEnabled' => true,
    'IsBirthdateLocked' => false
];

echo json_encode($data);