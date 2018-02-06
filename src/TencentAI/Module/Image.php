<?php

namespace TencentAI\Module;

use TencentAI\Error\TencentAIError;
use TencentAI\TencentAI;

trait Image
{
    public static $file_type_array = ['jpg', 'png', 'bmp',];

    /**
     * 图片公共方法
     *
     * @param $url
     * @param $image
     * @return mixed
     * @throws TencentAIError
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
     * @return string
     * @throws TencentAIError
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
