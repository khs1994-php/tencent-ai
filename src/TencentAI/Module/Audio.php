<?php

declare(strict_types=1);

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
    private function check($check, string $array_name, int $code): void
    {
        if (!in_array($check, $this->$array_name, true)) {
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
    private function checkAsrFormat(int $format): void
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
    private function checkAsrRate(int $rate): void
    {
        $this->check($rate, 'asrRate', 90101);
    }

    /**
     * 检查语音翻译文件格式.
     *
     * @param $format
     *
     * @throws TencentAIError
     */
    private function checkTranslateFormat($format): void
    {
        $this->check($format, 'translateFormat', 90702);
    }

    /**
     * 编码文件.
     *
     * 传入本地路径或文件内容
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
