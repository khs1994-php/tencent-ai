<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class ImageTest extends TencentAITestCase
{
    const IMAGE = __DIR__.'/../resource/vision/';

    const OUTPUT = __DIR__.'/../output/image/';

    const IMAGE_FACE = self::IMAGE.'../face/wxc.jpg';

    const TERRORISM = self::IMAGE.'terrorism.jpg';

    const SCENER = self::IMAGE.'scener.jpg';

    const DOG = self::IMAGE.'dog.jpg';

    const FLOWER = self::IMAGE.'flower.jpg';

    const VEHICLE = self::IMAGE.'vehicle.jpg';

    const FOOD = self::IMAGE.'food.jpg';

    private $name;

    private $array;

    private function image()
    {
        return $this->ai()->image();
    }

    /**
     * 智能鉴黄.
     *
     * @throws TencentAIError
     */
    public function testPorn()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->porn(self::IMAGE_FACE);
    }

    /**
     * 暴恐识别.
     *
     * @throws TencentAIError
     */
    public function testTerrorism()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->terrorism(self::TERRORISM);
    }

    /**
     * 物体场景识别 => 场景识别.
     *
     * @throws TencentAIError
     */
    public function testScener()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->scener(self::SCENER);
    }

    /**
     * 物体场景识别 => 物体识别.
     *
     * @throws TencentAIError
     */
    public function testObject()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->object(self::DOG);
    }

    /**
     * 标签识别.
     *
     * @throws TencentAIError
     */
    public function testTag()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->tag(self::IMAGE_FACE);
    }

    /**
     * 花草识别.
     *
     * @throws TencentAIError
     */
    public function testIdentifyFlower()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->identifyFlower(self::FLOWER);
    }

    /**
     * 车辆识别.
     *
     * @throws TencentAIError
     */
    public function testIdentifyVehicle()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->identifyVehicle(self::VEHICLE);
    }

    /**
     * 看图说话.
     *
     * @throws TencentAIError
     */
    public function testImageToText()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->imageToText(self::IMAGE_FACE, 1);
    }

    /**
     * 模糊图片检测.
     *
     * @throws TencentAIError
     */
    public function testFuzzy()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->fuzzy(self::IMAGE_FACE);
    }

    /**
     * 美食图片.
     *
     * @throws TencentAIError
     */
    public function testFood()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->image()->food(self::FOOD);
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
