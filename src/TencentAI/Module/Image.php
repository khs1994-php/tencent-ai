<?php

namespace TencentAI\Module;

use TencentAI\TencentAI;
use TencentAI\Error\TencentAIError;

trait Image
{
    public static $file_type_array = ['jpg', 'png', 'bmp'];

    /**
     * 图片公共方法.
     *
     * @param $url
     * @param $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     */
    public static function image($url, $image)
    {
        $data = [
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 对图片文件进行 base64 编码
     *
     * @param string $image
     *
     * @throws TencentAIError
     *
     * @return string
     */
    public static function encode(string $image)
    {
        if (@is_file($image)) {
            return base64_encode(file_get_contents($image));
        } else {
            return base64_encode($image);
        }
    }
}
