<?php

define('BASEDIR', __DIR__.'/../src/');

spl_autoload_register(function ($class) {
    // code...
    require_once BASEDIR.str_replace('\\', '/', $class).'.php';
});

$config = [
    'app_id' => 1106560031,
    'app_key' => 'ZbRY9cf72TbDO0xb',
];

use TencentAI\TencentAI;

$ai = new TencentAI($config);

$output = $ai->nlp->textPolar("腾讯是中国互联网企业");

var_dump($output);

echo json_encode($output);
