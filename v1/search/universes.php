<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'success' => true,
    'data' => [
        [
            'id' => 13058, // universeid (example: https://apis.roblox.com/universes/v1/places/1818/universe)
            'name' => 'Classic: Crossorads',
            'description' => 'The classic ROBLOX level is back!',
            'isArchived' => false,
            'isActive' => true,
            'rootPlaceId' => 1818,
            'privacyType' => 'Public',
            'creatorType' => 'User',
            'creatorTargetId' => 1,
            'creatorName' => 'ROBLOX',
            'created' => '2026-05-03T17:57:23.000000Z',
            'updated' => '2026-05-19T17:54:09.000000Z',
        ]
    ]
];

echo json_encode($data);