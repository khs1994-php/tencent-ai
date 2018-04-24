<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Translate
{
    use Module\Translate;
    use Module\Audio;

    /**
     * 类常量可设置可见性.
     *
     * @since 7.1
     */
    public const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    private const AILAB_TEXT = self::BASE_URL.'nlp_texttrans';

    protected const TEXT = self::BASE_URL.'nlp_texttranslate';

    const IMAGE = self::BASE_URL.'nlp_imagetranslate';

    const AUDIO = self::BASE_URL.'nlp_speechtranslate';

    const DETECT = self::BASE_URL.'nlp_textdetect';

    /**
     * 文本翻译（AI Lab）.
     *
     * @param string $text
     * @param int    $type 翻译类型 0-16
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/nlptrans.shtml
     */
    public function aILabText(string $text, int $type = 0)
    {
        $this->checkAILabTextType($type);
        $data = [
            'text' => $text,
            'type' => $type,
        ];
        $url = self::AILAB_TEXT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 文本翻译（翻译君）.
     *
     * @param string $text
     * @param string $source 源语言缩写
     * @param string $target 目标语言缩写
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function text(string $text, string $source = 'auto', string $target = 'auto')
    {
        if (!('auto' === $source && 'auto' === $target)) {
            $this->checkTextTarget($source, $target);
        }

        $data = [
            'text' => $text,
            'source' => $source,
            'target' => $target,
        ];
        $url = self::TEXT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 图片翻译.
     *
     * @param mixed  $image      支持 JPG PNG BMP 格式
     * @param string $session_id 一次请求ID
     * @param string $scene      识别类型 word-单词识别，doc-文档识别
     * @param string $source     源语言缩写
     * @param string $target     目标语言缩写
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/imagetranslate.shtml
     */
    public function image($image,
                          string $session_id,
                          string $scene = 'word',
                          string $source = 'auto',
                          string $target = 'auto')
    {
        if ('word' !== $scene and 'doc' !== $scene) {
            throw new TencentAIError(90701);
        }

        if (!('auto' === $source && 'auto' === $target)) {
            $this->checkImageTarget($source, $target);
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
     * 语音翻译.
     *
     * @param string $speech_chunk 待识别语音分片
     * @param string $session_id   语音唯一标识（同一应用内）
     * @param int    $format       amr-3 silk-4 pcm-6 mp3-8 aac-9
     * @param int    $seq          语音分片所在语音流的偏移量（字节）
     * @param bool   $end          是否结束分片 true
     * @param string $source       源语言缩写
     * @param string $target       目标语言缩写
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/speechtranslate.shtml
     */
    public function audio(string $speech_chunk,
                          string $session_id,
                          int $format = 3,
                          int $seq = 0,
                          bool $end = true,
                          string $source = 'auto',
                          string $target = 'auto')
    {
        $this->checkTranslateFormat($format);
        if (!('auto' === $source && 'auto' === $target)) {
            $this->checkImageTarget($source, $target);
        }
        $data = [
            'format' => $format,
            'seq' => $seq,
            'end' => (int) $end,
            'session_id' => $session_id,
            'speech_chunk' => self::encode($speech_chunk),
            'source' => $source,
            'target' => $target,
        ];
        $url = self::AUDIO;

        return TencentAI::exec($url, $data);
    }

    /**
     * 语种识别.
     *
     * @param string $text
     * @param array  $languages
     * @param bool   $force     强制从待选择语言中选择
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/textdetect.shtml
     */
    public function detect(string $text, array $languages = null, bool $force = false)
    {
        if ($languages) {
            foreach ($languages as $k) {
                $this->checkDetectType($k);
            }
            // 多类型分隔符错误
            // TODO
            $languages = implode('”', $languages);
            var_dump($languages);
        }
        $data = [
            'text' => $text,
            'candidate_langs' => $languages,
            'force' => (int) $force,
        ];
        $url = self::DETECT;

        return TencentAI::exec($url, $data);
    }
}
