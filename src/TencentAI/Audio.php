<?php

namespace TencentAI;

class Audio extends TencentAI
{
    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/aai/';

    // 语音识别 echo 版

    public function asr(int $format=3, string $speech,int $rate=16000)
    {
        // code...
        $data=[
          'format'=>$format,
          'speech'=>base64_encode(file_get_contents($speech)),
          'rate'=>$rate
        ];
        $url=$this->baseUrl.'aai_asr';
        $this->exec($url, $data);
    }

    // 语音识别 流式版 AILab

    public function asrs($value = '')
    {
        // code...
    }

    // 语音识别 流式版 WeChatAI

    public function wxasrs($value = '')
    {
        // code...
    }

    // 长语音识别

    public function wxasrlong($value = '')
    {
        // code...
    }

    // 语音合成 AILab

    public function tts($value = '')
    {
        // code...
    }

    // 语音合成 优图

    public function tta($value = '')
    {
        // code...
    }
}
