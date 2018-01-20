<?php

namespace TencentAI;

class NaturalLanguageProcessing extends TencentAI
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
