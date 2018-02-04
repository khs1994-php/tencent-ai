<?php
require __DIR__.'/../vendor/autoload.php';

use TencentAI\TencentAI;

use TencentAI\Error\TencentAIError;

$config = [
    'app_id' => 1106560031,
    'app_key' => 'ZbRY9cf72TbDO0xb',
];

$ai = TencentAI::tencentAI($config);

try {
    $output = $ai->face()->detect(__DIR__.'/image/ai/tencent/face/wxc.jpg');
} catch (TencentAIError $e) {
    $output = $e->getArray();
}

// return array

var_dump($output);
