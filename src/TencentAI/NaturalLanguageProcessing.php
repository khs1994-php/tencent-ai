<?php

namespace TencentAI;

class NaturalLanguageProcessing extends AIBase
{
    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    public function common($url, $text, bool $type = true)
    {
        // code...
        $data = [
          'text' => $text,
        ];

        if ($type) {
            return $this->exec($url, $data, 'gbk');
        }

        return $this->exec($url, $data);
    }

    // GBK START

    // 分词

    public function wordseg(string $text)
    {
        // code...
        $url = $this->baseUrl.'nlp_wordseg';

        return $this->common($url, $text);
    }

    // 词性标注

    public function wordpos(string $text)
    {
        // code...
        $url = $this->baseUrl.'nlp_wordpos';

        return $this->common($url, $text);
    }

    // 专有名词识别

    public function wordner(string $text)
    {
        // code...
        $url = $this->baseUrl.'nlp_wordner';

        return $this->common($url, $text);
    }

    // 同义词识别

    public function wordsyn(string $text)
    {
        // code...
        $url = $this->baseUrl.'nlp_wordsyn';

        return $this->common($url, $text);
    }

    // GBK END

    // 语义解析 => 意图成分识别

    public function wordcom($text)
    {
        $url = $this->baseUrl.'nlp_wordcom';

        return $this->common($url, $text, false);
    }

    // 情感分析

    public function textPolar($text)
    {
        // code...
        $url = $this->baseUrl.'nlp_textpolar';

        return $this->common($url, $text, false);
    }

    // 智能闲聊

    public function textChat(string $question, string $session)
    {
        // code...
        $data = [
                'question' => $question,
                'session' => $session,
        ];

        $baseurl = 'https://api.ai.qq.com/fcgi-bin/nlp/nlp_textchat';

        return $this->exec($data, $baseurl);
    }
}
