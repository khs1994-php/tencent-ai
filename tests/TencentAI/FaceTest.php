<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class FaceTest extends TestCase
{
    public function testDetect()
    {
        // code...
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];

        $ai = new TencentAI($config);

        $array = $ai->face->detect(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertContains('ok', $array['msg']);

        $array = $ai->face->compare([
          getcwd().'/tests/image/ai/tencent/face/wxc.jpg',
          getcwd().'/tests/image/ai/tencent/face/verify.jpg'
        ]);
        $this->assertEquals(0, $array['ret']);

        $array = $ai->face->shape(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }
}
