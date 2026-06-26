<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'data' => [
        [
            'gameTemplateType' => 'Gameplay', // Theme or Gameplay
            'hasTutorials' => false,
            'universe' => [
                'id' => 13058, // universeid (example: https://apis.roblox.com/universes/v1/places/1818/universe)
                'name' => 'Classic: Crossroads',
                'description' => 'The classic ROBLOX level is back!',
                'isArchived' => false,
                'rootPlaceId' => 1818,
                'isActive' => true,
                'privacyType' => 'Public',
                'creatorType' => 'User',
                'creatorTargetId' => 1,
                'creatorName' => 'Templates',
                'created' => '2013-11-01T08:47:14.07Z',
                'updated' => '2023-05-02T22:03:01.107Z',
                'audiences' => []
            ]
        ]
    ]
];

echo json_encode($data);