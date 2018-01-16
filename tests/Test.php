<?php

define('BASEDIR', __DIR__.'/../src/');

spl_autoload_register(function ($class) {
    # code...
    require_once BASEDIR.str_replace('\\', '/', $class).'.php';
});

use TencentAI\Face;

$ai=new Face();

var_dump($ai->compare());
