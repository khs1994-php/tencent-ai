<?php

use PHPUnit\Framework\TestCase;

use TencentAI\TencentAI;

class ImageTest extends TestCase
{
    public $ai;

    public function setup()
    {
        # code...
        $config = [
          'app_id' => 1106560031,
          'app_key' => 'ZbRY9cf72TbDO0xb',
        ];

        $this->ai = new TencentAI($config);
    }

    public function testPorn()
    {
        $array=$this->ai->image->porn(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }
}
