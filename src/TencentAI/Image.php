<?php

namespace TencentAI;

class Image
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/';

    // 智能鉴黄

    public function porn(string $image)
    {
        $url = self::BASE_URL.'vision/vision_porn';

        return $this->image($url, $image);
    }

    // 暴恐识别

    public function terrorism(string $image)
    {
        $url = self::BASE_URL.'image/image_terrorism';

        return $this->image($url, $image);
    }

    // 物体场景识别=》场景识别

    public function scener(string $image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::BASE_URL.'vision/vision_scener';

        return TencentAI::exec($url, $data);
    }

    // 物体场景识别=》物体识别

    public function objectr(string $image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::BASE_URL.'vision/vision_objectr';

        return TencentAI::exec($url, $data);
    }

    // 标签识别

    public function tag($image)
    {
        $url = self::BASE_URL.'image/image_tag';

        return TencentAI::exec($url, $image);
    }

    // 花草/车辆识别

    public function identify(string $image, int $scene = 2)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'scene' => $scene,
        ];
        $url = self::BASE_URL.'vision/vision_imgidentify';

        return TencentAI::exec($url, $data);
    }

    // 看图说话

    public function imageToText(string $image, string $session_id)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'session_id' => $session_id,
        ];

        $url = self::BASE_URL.'vision/vision_imgtotext';

        return TencentAI::exec($url, $data);
    }

    // 模糊图片检测

    public function fuzzy(string $image)
    {
        $url = self::BASE_URL.'image/image_fuzzy';

        return $this->image($url, $image);
    }

    // 美食图片识别

    public function food($image)
    {
        $url = self::BASE_URL.'image/image_food';

        return $this->image($url, $image);
    }
}
