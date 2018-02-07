<?php

namespace TencentAI\Module;

use TencentAI\Error\TencentAIError;

trait Audio
{
    private $asrFormat = [1, 2, 3, 4,];

    private $asrRate = [8000, 16000,];

    private $aaiWxAsrsFormat = [1, 2, 3, 4, 5,];

    /**
     * @param        $check
     * @param string $array_name
     * @param int    $code
     * @throws TencentAIError
     */
    private function check($check, string $array_name, int $code)
    {
        if (!in_array($check, $this->$array_name)) {
            throw new TencentAIError($code);
        }
    }

    /**
     * @param $format
     * @throws TencentAIError
     */
    public function checkAsrFormat(int $format)
    {
        $this->check($format, 'asrFormat', 90020);
    }

    /**
     * @param int $rate
     * @throws TencentAIError
     */
    public function checkAsrRate(int $rate)
    {
        $this->check($rate, 'asrRate', 90021);
    }

    public function encode(string $voice)
    {
        if (@is_file($voice)) {
            return base64_encode(file_get_contents($voice));
        } else {

            return base64_encode($voice);
        }
    }

}
