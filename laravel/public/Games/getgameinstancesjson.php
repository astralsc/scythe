<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'PlaceId' => 189707,
    'ShowShutdownAllButton' => false,
    'Collection' => [
        [
            'Capacity' => 25,
            'Ping' => 111,
            'Fps' => 60.999992370605,
            'ShowSlowGameMessage' => false,
            'Guid' => '12843cc3-97ad-4b4e-9239-329d47f204d2',
            'PlaceId' => 10851599,
            'CurrentPlayers' => [
                [
                    'Id' => 9520030,
                    'Username' => 'SmackDownfan619',
                    'Thumbnail' => [
                        'AssetId' => 0,
                        'AssetHash' => null,
                        'AssetTypeId' => 0,
                        'Url' => 'https://web.archive.org/web/20160610033333/https://t4.rbxcdn.com/167cd3a3c935128aca87dc358d42ad88',
                        'IsFinal' => true,
                    ],
                ],
            ],
        ],
    ],
    'TotalCollectionSize' => 0
];

echo json_encode($data);