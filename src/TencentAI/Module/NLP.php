<?php

namespace TencentAI\Module;

use TencentAI\TencentAI;
use TencentAI\Error\TencentAIError;

trait NLP
{
    /**
     * 自然语言处理公共方法.
     *
     * @param      $url
     * @param      $text
     * @param bool $charSetGBK
     *
     * @throws TencentAIError
     *
     * @return array
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
            'text' => $text,
        ];

        return TencentAI::exec($url, $data);
    }
}
