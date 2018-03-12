<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class AudioTest extends TencentAITests
{
    const AUDIO = __DIR__.'/../resource/audio/';

    const OUTPUT = __DIR__.'/../output/audio/';

    private $name;

    private $array;

    private function audio()
    {
        return $this->ai()->audio();
    }

    /**
     * 语音识别.
     *
     * @throws TencentAIError
     */
    public function testAsr()
    {
        $this->name = __FUNCTION__;

        $voice = self::AUDIO.'/2.wav';
        $this->array = $this->audio()->asr($voice, 2, 16000);
    }

    /**
     * 语音识别 流式版 AILAB.
     *
     * @throws TencentAIError
     */
    public function testasrs()
    {
        $this->name = __FUNCTION__;

        $voice = self::AUDIO.'/2.wav';
        $this->array = $this->audio()->asrs($voice, 1, 0, 2);
    }

    /**
     * 语音识别 流式版 微信
     *
     * @throws TencentAIError
     */
    public function testWxasrs()
    {
        $this->name = __FUNCTION__;

        $voice = self::AUDIO.'/2.wav';
        $this->array = $this->audio()->wxasrs($voice, 1, 0, 2);
    }

    /**
     * 长语音识别.
     *
     * @throws TencentAIError
     */
    public function testWxAsrLong()
    {
        $this->name = __FUNCTION__;

        $speech = self::AUDIO.'15s.wav';

        $this->array = $this->audio()->wxasrlong($speech, 'http://118.72.91.54:8081/callback.php', 2);
    }

    /**
     * 语音合成 AILAB.
     *
     * @throws TencentAIError
     */
    public function testTts()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->audio()->tts('北京天气怎么样', 1, 2);
        $this->put(__FUNCTION__.'.wav', $array['data']['speech']);
    }

    /**
     * 语音合成 优图.
     *
     * @throws TencentAIError
     */
    public function testTta()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->audio()->tta('北京天气怎么样');
        $this->put(__FUNCTION__.'.mp3', $array['data']['voice']);
    }

    public function put(string $name, string $content)
    {
        file_put_contents(self::OUTPUT.$name, base64_decode($content));
    }

    /**
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        if ($this->name) {
            file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
        }
    }
}
