<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Image
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/';

    const PORN = self::BASE_URL.'vision/vision_porn';

    const TERRORISM = self::BASE_URL.'image/image_terrorism';

    const SCENER = self::BASE_URL.'vision/vision_scener';

    const OBJECT = self::BASE_URL.'vision/vision_objectr';

    const TAG = self::BASE_URL.'image/image_tag';

    const IDENTIFY = self::BASE_URL.'vision/vision_imgidentify';

    const IMAGE_TO_TEXT = self::BASE_URL.'vision/vision_imgtotext';

    const FUZZY = self::BASE_URL.'image/image_fuzzy';

    const FOOD = self::BASE_URL.'image/image_food';

    /**
     * 智能鉴黄
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/jianhuang.shtml
     *
     * @throws TencentAIError
     */
    public function porn(string $image)
    {
        $url = self::PORN;

        return self::image($url, $image);
    }

    /**
     * 暴恐识别
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/imageterrorism.shtml
     *
     * @throws TencentAIError
     */
    public function terrorism(string $image)
    {
        $url = self::TERRORISM;

        return $this->image($url, $image);
    }

    /**
     * 物体场景识别 => 场景识别
     *
     * 快速找出图片中包含的场景信息.
     *
     * @param  string $image
     * @param  int    $format
     * @param  int    $topk
     * @return mixed
     * @link   https://ai.qq.com/doc/visionimgidy.shtml
     *
     * @throws TencentAIError
     */
    public function scener(string $image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => self::encode($image),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::SCENER;

        return TencentAI::exec($url, $data);
    }

    /**
     * 物体场景识别 => 物体识别
     *
     * 快速找出图片中包含的物体信息.
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
        $url = self::OBJECT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 标签识别
     *
     * 识别一个图像的标签信息,对图像分类.
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/imagetag.shtml
     *
     * @throws TencentAIError
     */
    public function tag(string $image)
    {
        $url = self::TAG;

        return self::image($url, $image);
    }

    /**
     * 花草/车辆识别
     *
     * @param  string $image
     * @param  int    $scene 识别场景，1-车辆识别，2-花草识别
     * @return mixed
     * @link   https://ai.qq.com/doc/imgidentify.shtml
     *
     * @throws TencentAIError
     */
    private function identify(string $image, int $scene)
    {
        $data = [
            'image' => self::encode($image),
            'scene' => $scene,
        ];
        $url = self::IDENTIFY;

        return TencentAI::exec($url, $data);
    }

    /**
     * 花草识别
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function identifyFlower(string $image)
    {
        return $this->identify($image, 2);
    }

    /**
     * 车辆识别
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function identifyVehicle(string $image)
    {
        return $this->identify($image, 1);
    }

    /**
     * 看图说话：用一句话文字描述图片
     *
     * @param  string $image
     * @param  string $session_id
     * @return mixed
     * @link   https://ai.qq.com/doc/imgtotext.shtml
     *
     * @throws TencentAIError
     */
    public function imageToText(string $image, string $session_id)
    {
        $data = [
            'image' => self::encode($image),
            'session_id' => $session_id,
        ];

        $url = self::IMAGE_TO_TEXT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 模糊图片检测：判断一个图像的模糊程度
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/imagefuzzy.shtml
     *
     * @throws TencentAIError
     */
    public function fuzzy(string $image)
    {
        $url = self::FUZZY;

        return $this->image($url, $image);
    }

    /**
     * 美食图片识别：识别一个图像是否为美食图像
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/imagefood.shtml
     *
     * @throws TencentAIError
     */
    public function food(string $image)
    {
        $url = self::FOOD;

        return $this->image($url, $image);
    }
}
