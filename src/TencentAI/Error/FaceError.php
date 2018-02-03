<?php

namespace TencentAI\Error;

class FaceError extends \Error
{
    public $message;

    public $code;

    public function __construct(int $code)
    {
        $this->code = $code;
        switch ($code) {
            case 20001:
                $message = '人脸对比必须传入两张图片';
                break;
            case 2002:
                $message = 'mode 值必须为 0 或 1';
                break;
            default:
                $message = 'Error';
        }
        $this->message = $message;

    }

    public function __toString()
    {
        return json_encode(['return' => $this->getCode(), 'message' => $this->getMessage()]);
    }
}