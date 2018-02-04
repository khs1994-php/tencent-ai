<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public $aiImage;

    public $image;

    public $imageTerrorism;

    public $imageScener;

    public $imageDog;

    public $imageFlower;

    public $imageVehicle;

    public $imageFood;

    public function setup()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];

        $this->aiImage = TencentAI::tencentAI($config)->image;
        $imageDir = __DIR__.'/../image/ai/tencent/vision/';
        $this->image = $imageDir.'../face/wxc.jpg';
        $this->imageDog = $imageDir.'dog.jpg';
        $this->imageFlower = $imageDir.'flower.jpg';
        $this->imageFood = $imageDir.'food.jpg';
        $this->imageTerrorism = $imageDir.'terrorism.jpg';
        $this->imageScener = $imageDir.'scener.jpg';
        $this->imageVehicle = $imageDir.'vehicle.jpg';
    }

    // 智能鉴黄

    public function testPorn()
    {
        $array = $this->aiImage->porn($this->image);
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }

    // 暴恐识别

    public function testTerrorism()
    {
        $array = $this->aiImage->terrorism($this->imageTerrorism);
        $this->assertEquals(0, $array['ret']);
    }

    //物体场景识别 => 场景识别

    public function testScener()
    {
        $array = $this->aiImage->scener($this->imageScener);
        $this->assertEquals(0, $array['ret']);
    }

    // 物体场景识别 => 物体识别

    public function testObject()
    {
        $array = $this->aiImage->object($this->imageDog);
        $this->assertEquals(0, $array['ret']);
    }

    // 标签识别

    public function testTag()
    {
        $array = $this->aiImage->tag($this->image);
        $this->assertEquals(0, $array['ret']);
    }

    // 花草识别

    public function testIdentifyFlower()
    {
        $array = $this->aiImage->identifyFlower($this->imageFlower);
        $this->assertEquals(0, $array['ret']);
    }

    // 车辆识别

    public function testIdentifyVehicle()
    {
        $array = $this->aiImage->identifyVehicle($this->imageVehicle);
        $this->assertEquals(0, $array['ret']);
    }

    // 看图说话

    public function testImageToText()
    {
        $array = $this->aiImage->imageToText($this->image, 1);
        $this->assertEquals(0, $array['ret']);
    }

    // 模糊图片检测

    public function testFuzzy()
    {
        $array = $this->aiImage->fuzzy($this->image);
        $this->assertEquals(0, $array['ret']);
    }

    // 美食图片

    public function testFood()
    {
        $array = $this->aiImage->food($this->imageFood);
        $this->assertEquals(0, $array['ret']);
    }
}
