<?php

declare(strict_types=1);

namespace TencentAI;

use TencentAI\Error\TencentAIError;

/**
 * Tencent AI 图像相关能力.
 */
class Image
{
    use Module\Image;

    const PORN = 'vision/vision_porn';

    const TERRORISM = 'image/image_terrorism';

    const SCENER = 'vision/vision_scener';

    const OBJECT = 'vision/vision_objectr';

    const TAG = 'image/image_tag';

    const IDENTIFY = 'vision/vision_imgidentify';

    const IMAGE_TO_TEXT = 'vision/vision_imgtotext';

    const FUZZY = 'image/image_fuzzy';

    const FOOD = 'image/image_food';

    /**
     * 智能鉴黄.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/jianhuang.shtml
     */
    public function porn($image)
    {
        $url = self::PORN;

        return self::image($url, $image);
    }

    /**
     * 暴恐识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imageterrorism.shtml
     */
    public function terrorism($image)
    {
        $url = self::TERRORISM;

        return $this->image($url, $image);
    }

    /**
     * 物体场景识别 => 场景识别.
     *
     * 快速找出图片中包含的场景信息.
     *
     * @param mixed $image
     * @param int   $format 图片格式，只支持 JPG 格式
     * @param int   $topk   返回结果个数（已按置信度倒排）[1,5]
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/visionimgidy.shtml
     */
    public function scener($image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => self::encode($image),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::SCENER;

        $scene_list_array = [];

        $output = Request::exec($url, $data);

        if (is_array($output)) {
            $format = false;
            $scene_list = $output['data']['scene_list'];
        } else {
            $format = true;
            $output = json_decode($output, true);
            $scene_list = $output['data']['scene_list'];
        }

        foreach ($scene_list as $k) {
            $label_id = $k['label_id'];
            $label_id = self::$scene_array[$label_id];
            $scene_list_array[] = [
                'label_id' => $label_id,
                'label_confd' => $k['label_confd'],
            ];
        }
        $output['data']['scene_list'] = $scene_list_array;

        // 判断返回格式

        if ($format) {
            return json_encode($output, JSON_UNESCAPED_UNICODE);
        }

        return $output;
    }

    /**
     * 物体场景识别 => 物体识别.
     *
     * 快速找出图片中包含的物体信息.
     *
     * @param mixed $image
     * @param int   $format 图片格式，只支持 JPG 格式
     * @param int   $topk   返回结果个数（已按置信度倒排）[1,5]
     *
     * @throws TencentAIError
     *
     * @return mixed
     */
    public function object($image, int $format = 1, int $topk = 5)
    {
        $data = [
            'image' => self::encode($image),
            'format' => $format,
            'topk' => $topk,
        ];
        $url = self::OBJECT;

        return Request::exec($url, $data);
    }

    /**
     * 标签识别.
     *
     * 识别一个图像的标签信息,对图像分类.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imagetag.shtml
     */
    public function tag($image)
    {
        $url = self::TAG;

        return self::image($url, $image);
    }

    /**
     * 花草/车辆识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     * @param int   $scene 识别场景，1-车辆识别，2-花草识别
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imgidentify.shtml
     */
    private function identify($image, int $scene)
    {
        $data = [
            'image' => self::encode($image),
            'scene' => $scene,
        ];
        $url = self::IDENTIFY;

        return Request::exec($url, $data);
    }

    /**
     * 花草识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     */
    public function identifyFlower($image)
    {
        return $this->identify($image, 2);
    }

    /**
     * 车辆识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     */
    public function identifyVehicle($image)
    {
        return $this->identify($image, 1);
    }

    /**
     * 看图说话：用一句话文字描述图片.
     *
     * @param mixed  $image      支持 JPG PNG BMP 格式
     * @param string $session_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imgtotext.shtml
     */
    public function imageToText($image, string $session_id)
    {
        $data = [
            'image' => self::encode($image),
            'session_id' => $session_id,
        ];

        $url = self::IMAGE_TO_TEXT;

        return Request::exec($url, $data);
    }

    /**
     * 模糊图片检测：判断一个图像的模糊程度.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imagefuzzy.shtml
     */
    public function fuzzy($image)
    {
        $url = self::FUZZY;

        return $this->image($url, $image);
    }

    /**
     * 美食图片识别：识别一个图像是否为美食图像.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/imagefood.shtml
     */
    public function food($image)
    {
        $url = self::FOOD;

        return $this->image($url, $image);
    }
}
