<?php

namespace TencentAI\Module;

use TencentAI\TencentAI;

trait Image
{
    public static function image($url, $image)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
        ];

        return TencentAI::exec($url, $data);
    }
}
