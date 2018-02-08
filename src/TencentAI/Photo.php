<?php

namespace TencentAI;

class Photo
{
    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/ptu/';

    const COSMETIC = self::BASE_URL.'ptu_facecosmetic';

    const DECORATION = self::BASE_URL.'ptu_facedecoration';

    const FILTER = self::BASE_URL.'ptu_imgfilter';

    const AILAB_FILTER = 'https://api.ai.qq.com/fcgi-bin/vision/vision_imgfilter';

    const MERGE = self::BASE_URL.'ptu_facemerge';

    const STICKER = self::BASE_URL.'ptu_facesticker';

    const AGE = self::BASE_URL.'ptu_faceage';

    use Module\Image;

    /**
     * 人脸美妆 jpg png.
     *
     * 提供人脸美妆特效功能，可以帮您快速实现原始图片的人脸美妆特效处理
     *
     * @param  string $image
     * @param  int    $cosmetic 美妆编码 1-23
     *
     * @throws Error\TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facecosmetic.shtml
     */
    public function cosmetic(string $image, int $cosmetic)
    {
        $url = self::COSMETIC;
        $data = [
            'cosmetic' => $cosmetic,
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 人脸变妆.
     *
     * 提供人脸变妆特效功能，可以帮您快速实现原始图片的人脸变妆特效处理.
     *
     * @param  string $image
     * @param  int    $decoration 变妆编码 1-22
     *
     * @throws Error\TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facedecoration.shtml
     */
    public function decoration(string $image, int $decoration)
    {
        $url = self::DECORATION;
        $data = [
            'decoration' => $decoration,
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 图片滤镜（天天P图）.
     *
     * @param  string $image
     * @param  int    $filter
     *
     * @throws Error\TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/ptuimgfilter.shtml
     */
    public function filter(string $image, int $filter)
    {
        $url = self::FILTER;
        $data = [
            'filter' => $filter,
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 图片滤镜（AI Lab）.
     *
     * @param  string $image
     * @param  int    $filter
     * @param  string $session_id
     *
     * @throws Error\TencentAIError
     *
     * @return array
     */
    public function aiLabFilter(string $image, int $filter, string $session_id)
    {
        $url = self::AILAB_FILTER;
        $data = [
            'filter' => $filter,
            'image' => self::encode($image),
            'session_id' => $session_id,
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 人脸融合.
     *
     * @param string $image
     * @param int    $model 素材模板编码 1-50
     *
     * @throws Error\TencentAIError
     *
     * @return array
     *
     * @link https://ai.qq.com/doc/facemerge.shtml
     */
    public function merge(string $image, int $model)
    {
        $url = self::MERGE;
        $data = [
            'model' => $model,
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 大头贴.
     *
     * @param  string $image
     * @param  int    $sticker 大头贴编码 1-30
     *
     * @throws Error\TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facesticker.shtml
     */
    public function sticker(string $image, int $sticker)
    {
        $url = self::STICKER;
        $data = [
            'sticker' => $sticker,
            'image' => self::encode($image),
        ];

        return TencentAI::exec($url, $data);
    }

    /**
     * 颜龄检测.
     *
     * @param $image
     *
     * @throws Error\TencentAIError
     *
     * @return mixed
     *
     * @link https://ai.qq.com/doc/faceage.shtml
     */
    public function age($image)
    {
        $url = self::AGE;

        return self::image($url, $image);
    }
}
