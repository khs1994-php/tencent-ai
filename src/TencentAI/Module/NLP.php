<?php

namespace TencentAI\Module;

use TencentAI\TencentAI;

use TencentAI\Error\TencentAIError;


trait NLP
{
    /**
     * @param      $url
     * @param      $text
     * @param bool $charSetGBK
     * @return array
     * @throws TencentAIError
     */
    public function nlp($url, $text, bool $charSetGBK = true)
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
}