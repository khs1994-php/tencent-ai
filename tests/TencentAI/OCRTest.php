<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class OCRTest extends AI
{
    const IMAGE = __DIR__.'/../resource/ocr/';

    const OUTPUT = __DIR__.'/../output/ocr/';

    private $name;

    private $array;

    private function ocr()
    {
        return $this->ai()->ocr;
    }

    /**
     * 身份证识别
     *
     * @group DON'TTEST
     * @throws TencentAIError
     */
    public function testIdCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'idcardz.jpg';
        $this->array = $array = $this->ocr()->idCard($image);
        $this->assertEquals(0, $array['ret']);

        $image = self::IMAGE.'idcardf.jpg';
        $this->array = $this->ocr()->idCard($image, false);
    }

    /**
     * @throws TencentAIError
     */
    public function testBusinessCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'businesscard.jpg';
        $this->array = $this->ocr()->businessCard($image);
    }

    /**
     *
     * @throws TencentAIError
     */
    public function testDriverLicense()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'driver.jpg';
        $this->array = $array = $this->ocr()->driverLicense($image);
        $this->assertEquals(0, $array['ret']);

        $image = self::IMAGE.'driving.jpg';
        $this->array = $this->ocr()->driverLicense($image);
    }

    /**
     *
     * @throws TencentAIError
     */
    public function testBizLicense()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'biz.jpg';
        $this->array = $this->ocr()->bizLicense($image);
    }

    /**
     *
     * @throws TencentAIError
     */
    public function testCreditCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'creditcard.jpg';
        $this->array = $this->ocr()->creditCard($image);
    }

    /**
     *
     * @throws TencentAIError
     */
    public function testGeneral()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'general.jpg';
        $this->array = $this->ocr()->general($image);
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
