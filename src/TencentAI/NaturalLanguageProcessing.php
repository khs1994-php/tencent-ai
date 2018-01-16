<?php

namespace TencentAI;

class NaturalLanguageProcessing extends TencentAIController
{
    public function wordseg($value = '')
    {
        // code...
    }

    public function wordpos($value = '')
    {
        // code...
    }

    public function wordner($value = '')
    {
        // code...
    }

    public function wordsyn($value = '')
    {
        // code...
    }

    public function wordcom($value = '')
    {
        // code...
    }

    public function textPolar($value = '')
    {
        // code...
    }

    public function textChat(string $question = '你好', string $session = '10000')
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
