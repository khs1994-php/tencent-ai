<?php

require __DIR__.'/../vendor/autoload.php';

use TencentAI\TencentAI;
use TencentAI\Error\TencentAIError;

$config = [
    'app_id' => 1106560031,
    'app_key' => 'ZbRY9cf72TbDO0xb',
    'format' => 'json',
];

$ai = TencentAI::tencentAI($config);

$image = __DIR__.'/image/ai/tencent/face/wxc.jpg';

$image = file_get_contents($image);

try {
    $output = $ai->face->detect($image);
} catch (TencentAIError $e) {
    $output = $e->getArray();
}

// return array

var_dump($output);
