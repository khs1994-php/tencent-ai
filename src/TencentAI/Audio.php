<?php

namespace TencentAI;

class Audio
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/aai/';

    const ASR = self::BASE_URL.'aai_asr';

    const ASRS = self::BASE_URL.'';

    const LONG = self::BASE_URL.'aai_wxasrlong';

    const TTS = self::BASE_URL.'aai_tts';

    const TTA = self::BASE_URL.'aai_tta';

    use Module\Audio;

    /**
     * 语音识别 echo 版.
     *
     * @param string $speech
     * @param int    $format
     * @param int    $rate
     *
     * @throws Error\TencentAIError
     *
     * @return array
     */
    public function asr(string $speech, int $format = 3, int $rate = 8000)
    {
        $this->checkAsrFormat($format);
        $this->checkAsrRate($rate);
        $data = [
            'format' => $format,
            'speech' => $this->encode($speech),
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

    /**
     * 长语音识别
     *
     * @param string $speech
     * @param string $callback_url 异步识别，结果会 post 到回调地址.
     * @param int    $format       文件格式 pcm-1 wav-2 amr-3 silk-4
     * @param string $speech_url
     * @return array
     * @throws Error\TencentAIError
     */
    public function wxasrlong(string $speech = null, string $callback_url, int $format = 3, string $speech_url = null)
    {
        $url = self::LONG;
        $data = [
            'format' => $format,
            'callback_url' => $callback_url,
            'speech' => $this->encode($speech),
            'speech_url' => $speech_url,
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 语音合成 AILab
     *
     * 文字转语音
     *
     * @param string $text
     * @param int    $speaker 语音发音人编码 男普-1 女静琪-5 女欢馨-6 女碧萱-7
     * @param int    $format  合成语音格式 pcm-1 wav-2 mps-3
     * @param int    $volume  合成语音音量 [-10,10]
     * @param int    $speed   合成语音语速，默认100
     * @param int    $aht     合成语音降低/升高半音个数，即改变音高，默认0
     * @param int    $apc     控制频谱翘曲的程度，改变说话人的音色，默认58
     * @return array
     * @throws Error\TencentAIError
     */
    public function tts(string $text,
                        int $speaker = 1,
                        int $format = 3,
                        int $volume = 0,
                        int $speed = 100,
                        int $aht = 0,
                        int $apc = 58)
    {
        $url = self::TTS;
        $data = [
            'speaker' => $speaker,
            'format' => $format,
            'volume' => $volume,
            'speed' => $speed,
            'text' => $text,
            'aht' => $aht,
            'apc' => $apc
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 语音合成 优图
     *
     * @param string $text
     * @param int    $model 发音模型 女-0 女英-1 男-2 喜道公子-6
     * @param int    $speed 语速，默认为 0 , 0.6x => -2 , 0.8x => -1 , 1.2x => 1 , 1.5x => 2
     * @return array
     * @throws Error\TencentAIError
     */
    public function tta(string $text, int $model = 0, int $speed = -2)
    {
        $url = self::TTA;
        $data = [
            'text' => $text,
            'model_type' => $model,
            'speed' => $speed
        ];

        return TencentAI::exec($url, $data);
    }
}
