<?php

declare(strict_types=1);

return [
    'default' => env('TENCENT_AI_APP', 'default'),

    'app' => [
        'default' => [
            'app_id' => env('TENCENT_AI_APP_ID'),
            'app_key' => env('TENCENT_AI_APP_KEY'),
            'json_format' => env('TENCENT_AI_RETURN_JSON', false),
            'timeout' => env('TENCENT_AI_TIMEOUT', 100),
            'retry' => env('TENCENT_AI_RETRY', 1),
        ],

        'other' => [
            'app_id' => env('TENCENT_AI_OTHER_APP_ID'),
            'app_key' => env('TENCENT_AI_OTHER_APP_KEY'),
            'json_format' => env('TENCENT_AI_OTHER_RETURN_JSON', false),
            'timeout' => env('TENCENT_AI_OTHER_TIMEOUT', 100),
            'retry' => env('TENCENT_AI_RETRY', 1),
        ],
    ],
];
