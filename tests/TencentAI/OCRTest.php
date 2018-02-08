<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class OCRTest extends TestCase
{
    const IMAGE = __DIR__.'/../resource/ocr/';

    private $aiOCR;

    private $name;

    private $array;

    public function setUp()
    {
        $app_id = 1106560031;
        $app_key = 'ZbRY9cf72TbDO0xb';

        $this->aiOCR = TencentAI::tencentAI($app_id, $app_key)->ocr;
    }

    /**
     * @group DON'TTEST
     */

    public function testIdCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'idcardz.jpg';
        $this->array = $array = $this->aiOCR->idCard($image);
        $this->assertEquals(0, $array['ret']);

        $image = self::IMAGE.'idcardf.jpg';
        $this->array = $this->aiOCR->idCard($image, false);
    }

    public function testBusinessCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'businesscard.jpg';
        $this->array = $this->aiOCR->businessCard($image);
    }

    public function testDriverLicense()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'driver.jpg';
        $this->array = $array = $this->aiOCR->driverLicense($image);
        $this->assertEquals(0, $array['ret']);

        $image = self::IMAGE.'driving.jpg';
        $this->array = $this->aiOCR->driverLicense($image);
    }

    public function testBizLicense()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'biz.jpg';
        $this->array = $this->aiOCR->bizLicense($image);
    }

    public function testCreditCard()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'creditcard.jpg';
        $this->array = $this->aiOCR->creditCard($image);
    }

    public function testGeneral()
    {
        $this->name = __FUNCTION__;

        $image = self::IMAGE.'general.jpg';
        $this->array = $this->aiOCR->general($image);
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(__DIR__.'/../output/ocr/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
