<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'UserId' => 1,
    'TotalFriends' => 1,
    'CurrentPage' => 0,
    'PageSize' => 18,
    'TotalPages' => 0,
    'FriendsType' => 'AllFriends',
    'Friends' => [
        [
            'UserId' => 2,
            'AbsoluteURL' => '/users/2/profile/',
            'Username' => 'John Doe',
            'AvatarUri' => 'https://web.archive.org/web/20160420015344/http://t4.rbxcdn.com/18bce12918142ac6a1746e0c67fe30fb',
            'AvatarFinal' => true,
            'OnlineStatus' => [
                'LocationOrLastSeen' => 'Website',
                'ImageUrl' => '~/images/online.png',
                'AlternateText' => 'John Doe is online.'
            ],
            'Thumbnail' => [
                'Final' => true,
                'Url' => 'https://web.archive.org/web/20160420015344/http://t4.rbxcdn.com/18bce12918142ac6a1746e0c67fe30fb',
                'RetryUrl' => null
            ],
            'InvitationId' => 0,
            'LastLocation' => '',
            'PlaceId' => null,
            'AbsolutePlaceURL' => null,
            'IsOnline' => true,
            'InGame' => false,
            'InStudio' => false,
            'ItemVisible' => true,
            'FriendshipStatus' => 3
        ]
    ]
];

echo json_encode($data);