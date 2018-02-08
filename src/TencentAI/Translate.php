<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Translate
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    const AILAB_TEXT = self::BASE_URL.'nlp_texttrans';

    const TEXT = self::BASE_URL.'nlp_texttranslate';

    const IMAGE = self::BASE_URL.'nlp_imagetranslate';

    const AUDIO = self::BASE_URL.'nlp_speechtranslate';

    const DETECT = self::BASE_URL.'nlp_textdetect';

    /**
     * 文本翻译（AI Lab）
     *
     * @param string $text
     * @param int    $type 翻译类型 0-16
     * @return array
     * @throws TencentAIError
     */
    public function aILabText(string $text, int $type = 0)
    {
        if ($type > 16) {
            throw new TencentAIError(90003);
        }
        $data = [
            'text' => $text,
            'type' => $type,
        ];
        $url = self::AILAB_TEXT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 文本翻译（翻译君）
     *
     * @param string $text
     * @param string $source
     * @param string $target
     * @return array
     * @throws TencentAIError
     */
    public function text(string $text, string $source = 'auto', string $target = 'auto')
    {
        $data = [
            'text' => $text,
            'source' => $source,
            'target' => $target,
        ];

        $url = self::TEXT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 图片翻译
     *
     * @param string $image
     * @param string $session_id
     * @param string $scene 识别类型 word-单词识别，doc-文档识别
     * @param string $source
     * @param string $target
     * @return array
     * @throws TencentAIError
     */
    public function image(string $image, string $session_id, string $scene = 'word', string $source = 'auto', string $target = 'auto')
    {
        if ($scene !== 'word' and $scene !== 'doc') {
            throw new TencentAIError(90004);
        }
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'session_id' => $session_id,
            'scene' => $scene,
            'source' => $source,
            'target' => $target,
        ];
        $url = self::IMAGE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 语音翻译
     *
     * @param int    $format 3 4 6 8 9
     * @param int    $seq
     * @param int    $end    是否结束分片 0-中间分片，1-结束分片
     * @param string $session_id
     * @param string $speech_chunk
     * @param string $source
     * @param string $target
     * @return array
     * @throws TencentAIError
     */
    public function audio(int $format,
                          int $seq,
                          int $end,
                          string $session_id,
                          string $speech_chunk,
                          string $source = 'auto',
                          string $target = 'auto')
    {
        $data = [
            'format' => $format,
            'seq' => $seq,
            'end' => $end,
            'session_id' => $session_id,
            'speech_chunk' => $speech_chunk,
            'source' => $source,
            'target' => $target
        ];
        $url = self::AUDIO;

        return TencentAI::exec($url, $data);
    }

    /**
     * 语种识别
     *
     * @param string $text
     * @param string $candidate_langs 待选择语言
     * @param int    $force           强制从待选择语言中选择
     * @return array
     * @throws TencentAIError
     */
    public function detect(string $text, $candidate_langs = 'zh', int $force = 0)
    {
        $candidate_langs = is_array($candidate_langs) ? implode('"', $candidate_langs) : $candidate_langs;
        $data = [
            'text' => $text,
            'candidate_langs' => $candidate_langs,
            'force' => $force
        ];
        $url = self::DETECT;

        return TencentAI::exec($url, $data);
    }
}
