<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class TranslateTest extends TestCase
{
    private $aiTranslate;

    public $image;

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
        $array = $this->aiTranslate->aILabText('中华人民共和国', 0);
        $this->assertEquals(0, $array['ret']);
    }

    // 文本翻译 翻译君

    public function testText()
    {
        $array = $this->aiTranslate->text('中华人民共和国', 'zh', 'en');
        $this->assertEquals(0, $array['ret']);
    }

    // 图片翻译

    public function testImage()
    {
        $array = $this->aiTranslate->image($this->image, 1, 'word', 'en', 'zh');
        $this->assertEquals(0, $array['ret']);
    }

    // 语音翻译 TODO

    // 语种识别

    public function testDetect()
    {
        $array = $this->aiTranslate->detect('chinese');
        $this->assertEquals(0, $array['ret']);
    }

}