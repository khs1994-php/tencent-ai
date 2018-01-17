<?php

namespace TencentAI;

class Image extends TencentAI
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

    public function porn(string $image = './image/ai/tencent/face/wxc.jpg')
    {
        // code...
        $url = $this->baseUrl.'vision/vision_porn';

        return $this->common($url, $image);
    }

    // 暴恐识别

    public function terrorism(string $image = './image/ai/tencent/face/wxc.jpg')
    {
        // code...

        $url = $this->baseUrl.'image/image_terrorism';

        return $this->common($url, $image);
    }

    // 物体场景识别=》场景识别

    public function scener(string $image = './image/ai/tencent/vision/dog.jpg', int $format = 1, int $topk = 5)
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

    public function objectr(string $image = './image/ai/tencent/vision/dog.jpg', int $format = 1, int $topk = 5)
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

    public function tag($image = './image/ai/tencent/vision/dog.jpg')
    {
        // code...
        $url = $this->baseUrl.'image/image_tag';

        return $this->common($url, $image);
    }

    // 花草/车辆识别

    public function identify(string $image = './image/ai/tencent/vision/flower.jpg', int $scene = 2)
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

    public function imageToText(string $image = './image/ai/tencent/vision/flower.jpg', string $session_id = '1509333186')
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

    public function fuzzy(string $image = './image/ai/tencent/vision/flower.jpg')
    {
        // code...
        $url = $this->baseUrl.'image/image_fuzzy';

        return $this->common($url, $image);
    }

    // 美食图片识别

    public function food($image = './image/ai/tencent/vision/flower.jpg')
    {
        // code...
        $url = $this->baseUrl.'image/image_food';

        return $this->common($url, $image);
    }
}
