<?php

namespace TencentAI;

class Audio
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/aai/';

    const ASR = self::BASE_URL.'aai_asr';

    const ASRS = self::BASE_URL.'';

    use Module\Audio;

    /**
     * 语音识别 echo 版.
     *
     * @param int    $format
     * @param string $speech
     * @param int    $rate
     *
     * @throws Error\TencentAIError
     *
     * @return array
     */
    public function asr(int $format, string $speech, int $rate = 16000)
    {
        $this->checkAsrFormat($format);
        $this->checkAsrRate($rate);
        $speech = $this->encode($speech);
        $data = [
            'format' => $format,
            'speech' => $speech,
            'rate' => $rate,
        ];
        $url = self::ASR;

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
