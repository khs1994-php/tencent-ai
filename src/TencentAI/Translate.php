<?php

namespace TencentAI;

class Translate
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    public function AILabText(string $text, int $type = 0)
    {
        $data = [
            'text' => $text,
            'type' => $type,
        ];
        $url = self::BASE_URL.'nlp_texttrans';

        return TencentAI::exec($url, $data);
    }

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

    public function image(string $image, string $session_id, string $scene = 'word', string $source = 'zh', string $target = 'en')
    {
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

    public function detect(string $text, string $candidate_langs = 'zh', int $force = 0)
    {
        $data = [
            'text' => $text,
            'candidate_langs' => $candidate_langs,
            'force' => $force
        ];
        $url = self::BASE_URL.'nlp_textdetect';

        return TencentAI::exec($url, $data);
    }
}
