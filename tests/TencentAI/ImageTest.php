<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public $ai;

    public function setup()
    {
        // code...
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];

        $this->ai = TencentAI::tencentAI($config);
        $this->basedir = __DIR__;
    }

    public function testPorn()
    {
        $array = $this->ai->image()->porn(__DIR__.'/../image/ai/tencent/face/wxc.jpg');
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }
}
