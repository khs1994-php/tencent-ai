<?php

namespace TencentAI;

class Audio
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/aai/';

    // 语音识别 echo 版

    public function asr(int $format = 3, string $speech, int $rate = 16000)
    {
        $data = [
            'format' => $format,
            'speech' => base64_encode(file_get_contents($speech)),
            'rate' => $rate
        ];
        $url = self::BASE_URL.'aai_asr';
        return TencentAI::exec($url, $data);
    }

    // 语音识别 流式版 AILab

    public function asrs($value = '')
    {

    }

    // 语音识别 流式版 WeChatAI

    public function wxasrs($value = '')
    {

    }

    // 长语音识别

    public function wxasrlong($value = '')
    {

    }

    // 语音合成 AILab

    public function tts($value = '')
    {

    }

    // 语音合成 优图

    public function tta($value = '')
    {

    }
}
