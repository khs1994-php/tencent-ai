<?php

use PHPUnit\Framework\TestCase;

class FaceTest extends TestCase
{
    public function testDetect()
    {
        // code...
        $config=[
            "app_id"=>1106560031,
            "app_key"=> "ZbRY9cf72TbDO0xb"
        ];

        $face=new TencentAI\Face($config);
        $array=$face->detect(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertContains('ok',$array['msg']);
    }
}
