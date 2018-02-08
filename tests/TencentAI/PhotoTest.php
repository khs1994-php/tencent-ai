<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class PhotoTest extends TestCase
{
    private $aiPhoto;

    private $image;

    private $array;

    private $name;

    public function setUp()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];
        $this->aiPhoto = TencentAI::tencentAI($config)->photo;
        $this->image = __DIR__.'/../image/ai/tencent/face/wxc.jpg';
    }

    // 人脸美妆

    public function testCosmetic()
    {
        $this->array = $array = $this->aiPhoto->cosmetic($this->image, 12);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 人脸变妆

    public function testDecoration()
    {
        $this->array = $array = $this->aiPhoto->decoration($this->image, 22);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 滤镜 天天 P 图

    public function testFilter()
    {
        $this->array = $array = $this->aiPhoto->filter($this->image, 27);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 滤镜 AILAB

    public function testAILabFilter()
    {
        $this->array = $array = $this->aiPhoto->aiLabFilter($this->image, 47, 1);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 人脸融合

    public function testMerge()
    {
        $this->array = $array = $this->aiPhoto->merge($this->image, 28);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 大头贴

    public function testSticker()
    {
        $this->array = $array = $this->aiPhoto->sticker($this->image, 26);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }

    // 颜龄检测

    public function testAge()
    {
        $this->array = $array = $this->aiPhoto->age($this->image);
        $this->name = __FUNCTION__;
        $this->assertEquals(0, $array['ret']);
    }


    public function tearDown()
    {
        file_put_contents(__DIR__.'/../output/'.$this->name.'.jpg', base64_decode($this->array['data']['image']));
    }
}
