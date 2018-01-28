<?php

use TencentAI\TencentAI;

require '../vendor/autoload.php';

// define('BASEDIR', __DIR__.'/../src/');
//
// spl_autoload_register(function ($class) {
//     // code...
//     require_once BASEDIR.str_replace('\\', '/', $class).'.php';
// });

$config = [
    'app_id' => 1106560031,
    'app_key' => 'ZbRY9cf72TbDO0xb',
];

$ai = new TencentAI($config);

$output = $ai->nlp->textChat('中国女演员王晓晨',1);

var_dump($output);

echo json_encode($output,JSON_UNESCAPED_UNICODE);
