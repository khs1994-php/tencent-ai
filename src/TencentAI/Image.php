<?php

namespace TencentAI;

class Image extends AIBase
{
    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/';

    public function common($url, $image)
    {
        // code...
        $data = [
        'image' => base64_encode(file_get_contents($image)),
        ];

        return $this->exec($url, $data);
    }

    // 智能鉴黄

    public function porn(string $image)
    {
        // code...
        $url = $this->baseUrl.'vision/vision_porn';

        return $this->common($url, $image);
    }

    // 暴恐识别

    public function terrorism(string $image)
    {
        // code...

        $url = $this->baseUrl.'image/image_terrorism';

        return $this->common($url, $image);
    }

    // 物体场景识别=》场景识别

    public function scener(string $image, int $format = 1, int $topk = 5)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'format' => $format,
          'topk' => $topk,
        ];
        $url = $this->baseUrl.'vision/vision_scener';

        return $this->exec($url, $data);
    }

    // 物体场景识别=》物体识别

    public function objectr(string $image, int $format = 1, int $topk = 5)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'format' => $format,
          'topk' => $topk,
        ];
        $url = $this->baseUrl.'vision/vision_objectr';

        return $this->exec($url, $data);
    }

    // 标签识别

    public function tag($image)
    {
        // code...
        $url = $this->baseUrl.'image/image_tag';

        return $this->common($url, $image);
    }

    // 花草/车辆识别

    public function identify(string $image, int $scene = 2)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'scene' => $scene,
        ];
        $url = $this->baseUrl.'vision/vision_imgidentify';

        return $this->exec($url, $data);
    }

    // 看图说话

    public function imageToText(string $image, string $session_id)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'session_id' => $session_id,
        ];

        $url = $this->baseUrl.'vision/vision_imgtotext';

        return $this->exec($url, $data);
    }

    // 模糊图片检测

    public function fuzzy(string $image)
    {
        // code...
        $url = $this->baseUrl.'image/image_fuzzy';

        return $this->common($url, $image);
    }

    // 美食图片识别

    public function food($image)
    {
        // code...
        $url = $this->baseUrl.'image/image_food';

        return $this->common($url, $image);
    }
}
