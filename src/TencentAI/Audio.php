<?php

declare(strict_types=1);

namespace TencentAI;

use TencentAI\Error\TencentAIError;

/**
 * Tencent AI 语音识别能力.
 */
class Audio
{
    use Module\Audio;

    /**
     * 语音识别 echo 版：提供在线识别语音的能力，对整段音频进行识别，识别完成后，将返回语音的文字内容.
     *
     * @param string $speech 待识别语音（时长上限 30s）语音数据的 Base64 编码，非空且长度上限 8MB
     * @param int    $format 语音压缩格式编码，定义见下文描述 pcm-1 wav-2 amr-3 silk-4
     * @param int    $rate   语音采样率编码，默认 16KHz，可选 8000 16000
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/aaiasr.shtml
     */
    public function asr(string $speech, int $format = 1, int $rate = 8000)
    {
        $this->checkAsrFormat($format);
        $this->checkAsrRate($rate);
        $data = [
            'format' => $format,
            'speech' => self::encode($speech),
            'rate' => $rate,
        ];
        $url = 'aai/aai_asr';

        return Request::exec($url, $data);
    }

    /**
     * 语音识别 流式版 AILab：提供流式识别语音的能力，可以轻松实现边录音边识别.
     *
     * @param string $speech_chunk 语音数据
     * @param string $speech_id    语音唯一标识（同一应用内）
     * @param int    $seq          语音分片所在语音流的偏移量，单位：字节。上一个分片的 seq + 上一个分片的 length
     * @param int    $format       音频压缩格式编码 pcm-1 wav-2 amr-3 silk-4
     * @param int    $rate         音频采样率编码，默认 16000。8000 16000
     * @param bool   $end          是否结束分片标识 默认 true
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function asrs(string $speech_chunk,
                         string $speech_id,
                         int $seq = 0,
                         int $format = 1,
                         int $rate = 16000,
                         bool $end = true)
    {
        $speech_chunk = self::encode($speech_chunk);
        $length = strlen($speech_chunk);
        $data = [
            'format' => $format,
            'rate' => $rate,
            'seq' => $seq,
            'len' => $length,
            'end' => (int) $end,
            'speech_id' => $speech_id,
            'speech_chunk' => $speech_chunk,
        ];
        $url = 'aai/aai_asrs';

        return Request::exec($url, $data);
    }

    /**
     * 语音识别 流式版 WeChatAI：提供流式识别语音的能力，可以轻松实现边录音边识别.
     *
     * @param string $speech_chunk 语音数据
     * @param string $speech_id    语音唯一标识（同一应用内）
     * @param int    $seq          语音分片所在语音流的偏移量，单位：字节。上一个分片的 seq + 上一个分片的 length
     * @param int    $format       音频压缩格式编码 pcm-1 wav-2 amr-3 silk-4 speex-5
     * @param int    $rate         音频采样率编码，默认 16000
     * @param int    $bits         音频采样位数，默认 16 位
     * @param bool   $cont_res     是否获取中间识别结果 默认 true
     * @param bool   $end          是否结束分片标识 默认 true
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function wxasrs(string $speech_chunk,
                           string $speech_id,
                           int $seq = 0,
                           int $format = 1,
                           int $rate = 16000,
                           int $bits = 16,
                           bool $cont_res = true,
                           bool $end = true)
    {
        $speech_chunk = self::encode($speech_chunk);
        $length = strlen($speech_chunk);
        $url = 'aai/aai_wxasrs';
        $data = [
            'format' => $format,
            'rate' => $rate,
            'bits' => $bits,
            'seq' => $seq,
            'len' => $length,
            'end' => (int) $end,
            'speech_id' => $speech_id,
            'speech_chunk' => $speech_chunk,
            'cont_res' => (int) $cont_res,
        ];

        return Request::exec($url, $data);
    }

    /**
     * 长语音识别：上传长音频，提供回调接口，异步获取识别结果.
     *
     * @param string $speech       语音数据的 Base64 编码，原始音频大小上限 5MB
     * @param string $callback_url 用户回调 url，需用户提供，用于平台向用户通知识别结果
     * @param int    $format       语音压缩格式编码 pcm-1 wav-2 amr-3 silk-4
     * @param string $speech_url   待识别语音下载地址
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/wxasrlong.shtml
     */
    public function wxasrlong(?string $speech, string $callback_url, int $format = 3, string $speech_url = null)
    {
        $url = 'aai/aai_wxasrlong';
        $data = [
            'format' => $format,
            'callback_url' => $callback_url,
            'speech' => self::encode($speech),
            'speech_url' => $speech_url,
        ];

        return Request::exec($url, $data);
    }

    /**
     * 语音合成 AILab：将文字转换为语音，返回文字的语音数据.
     *
     * @param string $text    UTF-8 编码，非空且长度上限 150 字节
     * @param int    $speaker 语音发音人编码 男普-1 女静琪-5 女欢馨-6 女碧萱-7
     * @param int    $format  合成语音格式 pcm-1 wav-2 mp3-3
     * @param int    $volume  合成语音音量 [-10,10]
     * @param int    $speed   合成语音语速，默认 100
     * @param int    $aht     合成语音降低/升高半音个数，即改变音高，默认 0
     * @param int    $apc     控制频谱翘曲的程度，改变说话人的音色，默认 58
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/aaitts.shtml
     */
    public function tts(string $text,
                        int $speaker = 1,
                        int $format = 3,
                        int $volume = 0,
                        int $speed = 100,
                        int $aht = 0,
                        int $apc = 58)
    {
        $url = 'aai/aai_tts';
        $data = [
            'speaker' => $speaker,
            'format' => $format,
            'volume' => $volume,
            'speed' => $speed,
            'text' => $text,
            'aht' => $aht,
            'apc' => $apc,
        ];

        return Request::exec($url, $data);
    }

    /**
     * 语音合成 优图：将文字转换为语音，返回文字的语音数据.
     *
     * @param string $text  utf8 格式，最大 300 字节
     * @param int    $model 发音模型 女-0 女英-1 男-2 喜道公子-6
     * @param int    $speed 语速，默认为 0 , 0.6x -2 , 0.8x -1 , 1.2x 1 , 1.5x 2
     *
     * @throws TencentAIError
     *
     * @return array 返回 MP3 格式
     */
    public function tta(string $text, int $model = 0, int $speed = -2)
    {
        $url = 'aai/aai_tta';
        $data = [
            'text' => $text,
            'model_type' => $model,
            'speed' => $speed,
        ];

        return Request::exec($url, $data);
    }
}
