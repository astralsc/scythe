<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'signupAndLogin' => [
        'id' => 1,
        'locale' => 'en_us',
        'name' => 'English(US)',
        'nativeName' => 'English',
        'language' => [
            'id' => 41,
            'name' => 'English',
            'nativeName' => 'English',
            'languageCode' => 'en',
            'isRightToLeft' => false,
        ],
    ],
    'generalExperience' => [
        'id' => 1,
        'locale' => 'en_us',
        'name' => 'English(US)',
        'nativeName' => 'English',
        'language' => [
            'id' => 41,
            'name' => 'English',
            'nativeName' => 'English',
            'languageCode' => 'en',
            'isRightToLeft' => false,
        ],
    ],
    'ugc' => [
        'id' => 34,
        'locale' => 'nl_nl',
        'name' => 'Dutch',
        'nativeName' => 'Nederlands',
        'language' => [
            'id' => 39,
            'name' => 'Dutch',
            'nativeName' => 'Dutch',
            'languageCode' => 'nl',
            'isRightToLeft' => false,
        ],
    ],
    'showRobloxTranslations' => false
];

echo json_encode($data);