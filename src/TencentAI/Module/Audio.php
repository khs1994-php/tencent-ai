<?php

namespace TencentAI\Module;

use TencentAI\Error\TencentAIError;

trait Audio
{
    private $asrFormat = [1, 2, 3, 4];

    private $asrRate = [8000, 16000];

    private $aaiWxAsrsFormat = [1, 2, 3, 4, 5];

    private $translateFormat = [3, 4, 6, 8, 9];

    /**
     * 抛出错误.
     *
     * @param        $check
     * @param string $array_name
     * @param int    $code
     *
     * @throws TencentAIError
     */
    private function check($check, string $array_name, int $code)
    {
        if (!in_array($check, $this->$array_name)) {
            throw new TencentAIError($code);
        }
    }

    /**
     * 检查格式参数.
     *
     * @param $format
     *
     * @throws TencentAIError
     */
    private function checkAsrFormat(int $format)
    {
        $this->check($format, 'asrFormat', 90100);
    }

    /**
     * 检查速率参数.
     *
     * @param int $rate
     *
     * @throws TencentAIError
     */
    private function checkAsrRate(int $rate)
    {
        $this->check($rate, 'asrRate', 90101);
    }

    /**
     * 检查语音翻译文件格式.
     *
     * @param string $format
     *
     * @throws TencentAIError
     */
    private function checkTranslateFormat(string $format)
    {
        $this->check($format, 'translateFormat', 90700);
    }

    /**
     * 编码文件.
     *
     * @param string $voice
     *
     * @return string
     */
    private static function encode(string $voice)
    {
        if (@is_file($voice)) {
            return base64_encode(file_get_contents($voice));
        } else {
            return base64_encode($voice);
        }
    }
}
