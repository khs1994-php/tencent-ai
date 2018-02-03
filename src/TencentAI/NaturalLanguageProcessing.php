<?php

namespace TencentAI;

class NaturalLanguageProcessing
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    public function common($url, $text, bool $charSetGBK = true)
    {
        if ($charSetGBK) {
            $data = [
                'text' => mb_convert_encoding($text, 'gbk', 'utf8'),
            ];

            return TencentAI::exec($url, $data, false);
        }

        $data = [
            'text' => $text
        ];

        return TencentAI::exec($url, $data);
    }

    // GBK START

    // 分词

    public function wordseg(string $text)
    {
        $url = self::BASE_URL.'nlp_wordseg';

        return $this->common($url, $text);
    }

    // 词性标注

    public function wordpos(string $text)
    {
        $url = self::BASE_URL.'nlp_wordpos';

        return $this->common($url, $text);
    }

    // 专有名词识别

    public function wordner(string $text)
    {
        $url = self::BASE_URL.'nlp_wordner';

        return $this->common($url, $text);
    }

    // 同义词识别

    public function wordsyn(string $text)
    {
        $url = self::BASE_URL.'nlp_wordsyn';

        return $this->common($url, $text);
    }

    // GBK END

    // 语义解析 => 意图成分识别

    public function wordcom($text)
    {
        $url = self::BASE_URL.'nlp_wordcom';

        return $this->common($url, $text, false);
    }

    // 情感分析

    public function textPolar($text)
    {
        $url = self::BASE_URL.'nlp_textpolar';

        return $this->common($url, $text, false);
    }

    // 智能闲聊

    public function textChat(string $question, string $session)
    {
        $data = [
            'question' => $question,
            'session' => $session,
        ];

        $url = self::BASE_URL.'/nlp_textchat';

        return TencentAI::exec($url, $data);
    }
}
