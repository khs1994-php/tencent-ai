<?php

define('BASEDIR', __DIR__.'/../src/');

spl_autoload_register(function ($class) {
    // code...
    require_once BASEDIR.str_replace('\\', '/', $class).'.php';
});

use TencentAI\Image;

$ai = new Image();

$array=$ai->food();

var_dump($array);

echo json_encode($array);
