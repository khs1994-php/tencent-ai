<?php

namespace TencentAI\Tests;

class AudioTest extends AI
{
    const AUDIO = __DIR__.'/../resource/audio/';

    const OUTPUT = __DIR__.'/../output/audio/';

    private $name;

    private $array;

    private function audio()
    {

        return $this->ai()->audio;
    }

    /**
     * @throws \TencentAI\Error\TencentAIError
     */
    public function testAsr()
    {
        $this->name = __FUNCTION__;

        $voice = self::AUDIO.'/t.amr';
        $this->array = $this->audio()->asr($voice);
    }

    /**
     * 长语音识别
     *
     * @throws \TencentAI\Error\TencentAIError
     */
    public function testWxAsrLong()
    {
        $this->name = __FUNCTION__;

        $speech = self::AUDIO.'15s.wav';

        $this->array = $this->audio()->wxasrlong($speech, 'http://118.72.91.54:8081/callback.php', 2);
    }

    /**
     * 语音合成 AILAB
     *
     * @throws \TencentAI\Error\TencentAIError
     */
    public function testTts()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->audio()->tts('你好', 1, 1);
        $this->put(__FUNCTION__.'.pcm', $array['data']['speech']);
    }

    /**
     * 语音合成 优图
     *
     * @throws \TencentAI\Error\TencentAIError
     */
    public function testTta()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->audio()->tta('你好');
        $this->put(__FUNCTION__.'.mp3', $array['data']['voice']);
    }

    public function put(string $name, string $content)
    {
        file_put_contents(self::OUTPUT.$name, base64_decode($content));
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        if ($this->name) {
            file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
        }
    }
}

