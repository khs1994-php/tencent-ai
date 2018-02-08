<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class AudioTest extends TestCase
{
    const AUDIO = __DIR__.'/../resource/audio/';
    private $aiAudio;

    private $name;

    private $array;

    public function setup()
    {

        $app_id = 1106560031;
        $app_key = 'ZbRY9cf72TbDO0xb';

        $this->aiAudio = TencentAI::tencentAI($app_id, $app_key)->audio();
    }

    public function testAsr()
    {
        $this->name = __FUNCTION__;

        $voice = self::AUDIO.'/t.amr';
        $this->array = $this->aiAudio->asr($voice);
    }

    // 长语音识别

    public function testWxAsrLong()
    {
        $this->name = __FUNCTION__;

        $speech = self::AUDIO.'15s.wav';

        $this->array = $this->aiAudio->wxasrlong($speech, 'http://118.72.91.54:8081/callback.php', 2);
    }

    // 语音合成 AILAB

    public function testTts()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->aiAudio->tts('你好', 1, 1);
        $this->put(__FUNCTION__.'.pcm', $array['data']['speech']);

    }

    // 语音合成 优图

    public function testTta()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->aiAudio->tta('你好');
        $this->put(__FUNCTION__.'.mp3', $array['data']['voice']);
    }

    public function put(string $name, string $content)
    {
        file_put_contents(__DIR__.'/../output/audio/'.$name, base64_decode($content));
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        if ($this->name) {
            file_put_contents(__DIR__.'/../output/audio/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
        }
    }
}

