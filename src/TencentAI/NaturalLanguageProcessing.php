<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;
use TencentAI\Module\NLP;

class NaturalLanguageProcessing
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/nlp/';

    use NLP;

    /**
     * 分词 GBK
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function wordseg(string $text)
    {
        $url = self::BASE_URL.'nlp_wordseg';

        return $this->nlp($url, $text);
    }

    /**
     * 词性标注 GBK
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function wordpos(string $text)
    {
        $url = self::BASE_URL.'nlp_wordpos';

        return $this->nlp($url, $text);
    }

    /**
     * 专有名词识别 GBK
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function wordner(string $text)
    {
        $url = self::BASE_URL.'nlp_wordner';

        return $this->nlp($url, $text);
    }

    /**
     * 同义词识别 GBK
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function wordsyn(string $text)
    {
        $url = self::BASE_URL.'nlp_wordsyn';

        return $this->nlp($url, $text);
    }

    /**
     * 语义解析 => 意图成分识别
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function wordcom(string $text)
    {
        $url = self::BASE_URL.'nlp_wordcom';

        return $this->nlp($url, $text, false);
    }

    /**
     * 情感分析
     *
     * @param string $text
     * @return array
     * @throws TencentAIError
     */
    public function textPolar(string $text)
    {
        $url = self::BASE_URL.'nlp_textpolar';

        return $this->nlp($url, $text, false);
    }

    /**
     * 智能闲聊
     *
     * @param string $question
     * @param string $session
     * @return array
     * @throws TencentAIError
     */
    public function chat(string $question, string $session)
    {
        $data = [
            'question' => $question,
            'session' => $session,
        ];

        $url = self::BASE_URL.'/nlp_textchat';

        return TencentAI::exec($url, $data);
    }
}
