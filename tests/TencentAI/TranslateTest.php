<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class TranslateTest extends TestCase
{
    private $aiTranslate;

    private $image;

    private $name;

    private $array;

    public function setUp()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];
        $this->aiTranslate = TencentAI::tencentAI($config)->translate;
        $this->image = __DIR__.'/../image/ai/tencent/translate/english.jpg';
    }

    // 文本翻译 AILab

    public function testAILabText()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->aiTranslate->aILabText('中华人民共和国', 0);
        $this->assertEquals(0, $array['ret']);
    }

    // 文本翻译 翻译君

    public function testText()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->aiTranslate->text('中华人民共和国', 'zh', 'en');
    }

    // 图片翻译

    public function testImage()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiTranslate->image($this->image, 1, 'word', 'en', 'zh');
    }

    // 语音翻译 TODO

    // 语种识别

    public function testDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiTranslate->detect('chinese');
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(__DIR__.'/../output/translate/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
