<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Translate
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    /**
     * 文本翻译（AI Lab）
     *
     * @param string $text
     * @param int    $type
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
        $url = self::BASE_URL.'nlp_texttrans';

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
    public function text(string $text, string $source = 'en', string $target = 'zh')
    {
        $data = [
            'text' => $text,
            'source' => $source,
            'target' => $target,
        ];

        $url = self::BASE_URL.'nlp_texttranslate';

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
    public function image(string $image, string $session_id, string $scene = 'word', string $source = 'zh', string $target = 'en')
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
        $url = self::BASE_URL.'nlp_imagetranslate';

        return TencentAI::exec($url, $data);
    }

    /**
     * 语音翻译
     *
     * @param int    $format
     * @param int    $seq
     * @param int    $end
     * @param string $session_id
     * @param string $speech_chunk
     * @param string $source
     * @param string $target
     * @return array
     * @throws TencentAIError
     */
    public function audio(int $format, int $seq, int $end, string $session_id, string $speech_chunk, string $source, string $target)
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
        $url = self::BASE_URL.'nlp_speechtranslate';

        return TencentAI::exec($url, $data);
    }

    /**
     * 语种识别
     *
     * @param string $text
     * @param string $candidate_langs
     * @param int    $force
     * @return array
     * @throws TencentAIError
     */
    public function detect(string $text, $candidate_langs = 'zh“en', int $force = 0)
    {
        $candidate_langs = is_array($candidate_langs) ? implode('“', $candidate_langs) : $candidate_langs;
        $data = [
            'text' => $text,
            'candidate_langs' => $candidate_langs,
            'force' => $force
        ];
        $url = self::BASE_URL.'nlp_textdetect';

        return TencentAI::exec($url, $data);
    }
}
