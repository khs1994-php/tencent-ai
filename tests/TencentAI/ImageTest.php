<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public $aiImage;

    public $image;

    public function setup()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];

        $this->aiImage = TencentAI::tencentAI($config)->image();
        $this->image = __DIR__.'/../image/ai/tencent/face/wxc.jpg';
    }

    public function testPorn()
    {
        $array = $this->aiImage->porn($this->image);
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }
}
