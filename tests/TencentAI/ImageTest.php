<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    private $aiImage;

    private $image;

    private $imageTerrorism;

    private $imageScener;

    private $imageDog;

    private $imageFlower;

    private $imageVehicle;

    private $imageFood;

    private $name;

    private $array;

    public function setup()
    {
        $app_id = 1106560031;
        $app_key = 'ZbRY9cf72TbDO0xb';

        $this->aiImage = TencentAI::tencentAI($app_id, $app_key)->image;
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->porn($this->image);
    }

    // 暴恐识别

    public function testTerrorism()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->terrorism($this->imageTerrorism);
    }

    //物体场景识别 => 场景识别

    public function testScener()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->scener($this->imageScener);
    }

    // 物体场景识别 => 物体识别

    public function testObject()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->object($this->imageDog);
    }

    // 标签识别

    public function testTag()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->tag($this->image);
    }

    // 花草识别

    public function testIdentifyFlower()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->identifyFlower($this->imageFlower);
    }

    // 车辆识别

    public function testIdentifyVehicle()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->identifyVehicle($this->imageVehicle);
    }

    // 看图说话

    public function testImageToText()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->imageToText($this->image, 1);
    }

    // 模糊图片检测

    public function testFuzzy()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->fuzzy($this->image);
    }

    // 美食图片

    public function testFood()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiImage->food($this->imageFood);
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(__DIR__.'/../output/image/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
