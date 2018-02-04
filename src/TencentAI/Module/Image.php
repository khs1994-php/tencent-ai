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
        self::check($image);
        return base64_encode(file_get_contents($image));
    }

    /**
     * 检查是否是图片文件，检查后缀
     *
     * @param $image
     * @throws TencentAIError
     */
    public static function check($image)
    {
        // 是否为文件

        if (!is_file($image)) {
            throw new TencentAIError(90002);
        }

        // 检查大小

        if (filesize($image) >= 1024 * 1024) {
            throw new TencentAIError(16397);
        }

        // 检查后缀

        $file_name = basename($image);

        $array = explode('.', $file_name);

        $extensions = end($array);

        if (!in_array($extensions, self::$file_type_array)) {
            throw new TencentAIError(16396);
        }
    }
}
