<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

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
     * @param  string $image    仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param  int    $cosmetic 美妆编码 1-23
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facecosmetic.shtml
     */
    public function cosmetic(string $image, int $cosmetic = 23)
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
     * @param  string $image      仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param  int    $decoration 变妆编码 1-22
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facedecoration.shtml
     */
    public function decoration(string $image, int $decoration = 22)
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
     * @param  string $image  仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param  int    $filter 滤镜效果编码 1-32
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/ptuimgfilter.shtml
     */
    public function filter(string $image, int $filter = 32)
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
     * @param  string $image  仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param  string $session_id
     * @param  int    $filter 滤镜效果编码 1-65
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function aiLabFilter(string $image, string $session_id, int $filter)
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
     * @param string $image 仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param int    $model 素材模板编码 1-50
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link https://ai.qq.com/doc/facemerge.shtml
     */
    public function merge(string $image, int $model = 50)
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
     * @param  string $image   仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     * @param  int    $sticker 大头贴编码 1-30
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/facesticker.shtml
     */
    public function sticker(string $image, int $sticker = 30)
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
     * @param string $image 仅支持 JPG、PNG 类型图片，尺寸长宽不超过 1080，返回格式 JPG
     *
     * @return mixed
     *
     * @throws TencentAIError
     * @link https://ai.qq.com/doc/faceage.shtml
     */
    public function age(string $image)
    {
        $url = self::AGE;

        return self::image($url, $image);
    }
}
