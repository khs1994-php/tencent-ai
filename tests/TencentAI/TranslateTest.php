<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class TranslateTest extends AI
{
    const IMAGE = __DIR__.'/../resource/translate/english.jpg';

    const OUTPUT = __DIR__.'/../output/translate/';

    private $name;

    private $array;

    private function translate()
    {
        return $this->ai()->translate();
    }

    /**
     * 文本翻译 AILAB
     *
     * @throws TencentAIError
     */
    public function testAILabText()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->translate()->aILabText('中华人民共和国', 0);
    }

    /**
     * 文本翻译 翻译君
     *
     * @throws TencentAIError
     */
    public function testText()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->translate()->text('中华人民共和国', 'zh', 'en');
    }

    /**
     * 图片翻译
     *
     * @throws TencentAIError
     */
    public function testImage()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->translate()->image(self::IMAGE, 1, 'word', 'en', 'zh');
    }

    /**
     * 语音翻译
     *
     * @throws TencentAIError
     */
    public function testAudio()
    {
        $this->name = __FUNCTION__;

        $voice = __DIR__.'/../resource/translate/t.pcm';
        $this->array = $this->translate()->audio(6, 0, true, 1, $voice);
    }

    /**
     * 语种识别
     *
     * @throws TencentAIError
     */
    public function testDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->translate()->detect('chinese');
    }

    /**
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
