<?php

namespace TencentAI\Module;

use TencentAI\Error\TencentAIError;
use TencentAI\Request;
use TencentAI\TencentAI;

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
    private function nlp($url, $text, bool $charSetGBK = true)
    {
        if ($charSetGBK) {
            $data = [
                'text' => mb_convert_encoding($text, 'gbk', 'utf8'),
            ];

            return Request::exec($url, $data, false);
        }

        $data = [
            'text' => $text,
        ];

        return Request::exec($url, $data);
    }
}
