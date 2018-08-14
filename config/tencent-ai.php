<?php

declare(strict_types=1);

return [
    'appId' => env('TENCENTAI_APPID', null),
    'appKey' => env('TENCENTAI_APPKEY', null),
    'jsonFormat' => env('TENCENTAI_RETURN_JSON', false),
    'timeout' => env('TENCENTAI_TIMEOUT', 100),
];
