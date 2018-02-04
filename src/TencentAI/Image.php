<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Image
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/';

    /**
     * 智能鉴黄
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function porn(string $image)
    {
        $url = self::BASE_URL.'vision/vision_porn';

        return self::image($url, $image);
    }

    /**
     * 暴恐识别
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function terrorism(string $image)
    {
        $url = self::BASE_URL.'image/image_terrorism';

        return $this->image($url, $image);
    }

    /**
     * 物体场景识别=》场景识别
     *
     * @param string $image
     * @param int    $format
     * @param int    $topk
     * @return mixed
     * @throws TencentAIError
     */
    public function scener(string $image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => self::encode($image),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::BASE_URL.'vision/vision_scener';

        return TencentAI::exec($url, $data);
    }

    /**
     * 物体场景识别=》物体识别
     *
     * @param string $image
     * @param int    $format
     * @param int    $topk
     * @return mixed
     * @throws TencentAIError
     */
    public function object(string $image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => self::encode($image),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::BASE_URL.'vision/vision_objectr';

        return TencentAI::exec($url, $data);
    }

    /**
     * 标签识别
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function tag(string $image)
    {
        $url = self::BASE_URL.'image/image_tag';

        return self::image($url, $image);
    }

    /**
     * 花草/车辆识别
     *
     * @param string $image
     * @param int    $scene
     * @return mixed
     * @throws TencentAIError
     */
    public function identify(string $image, int $scene = 2)
    {
        $data = [
            'image' => self::encode($image),
            'scene' => $scene,
        ];
        $url = self::BASE_URL.'vision/vision_imgidentify';

        return TencentAI::exec($url, $data);
    }

    /**
     * 看图说话
     *
     * @param string $image
     * @param string $session_id
     * @return mixed
     * @throws TencentAIError
     */
    public function imageToText(string $image, string $session_id)
    {
        $data = [
            'image' => self::encode($image),
            'session_id' => $session_id,
        ];

        $url = self::BASE_URL.'vision/vision_imgtotext';

        return TencentAI::exec($url, $data);
    }

    /**
     * 模糊图片检测
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function fuzzy(string $image)
    {
        $url = self::BASE_URL.'image/image_fuzzy';

        return $this->image($url, $image);
    }

    /**
     * 美食图片识别
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function food(string $image)
    {
        $url = self::BASE_URL.'image/image_food';

        return $this->image($url, $image);
    }
}
