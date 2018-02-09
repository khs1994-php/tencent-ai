<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class PhotoTest extends AI
{
    const IMAGE = __DIR__.'/../resource/face/wxc.jpg';

    const OUTPUT = __DIR__.'/../output/photo/';

    private $name;

    private $array;

    private function photo()
    {
        return $this->ai()->photo();
    }

    /**
     * 人脸美妆
     *
     * @throws TencentAIError
     */
    public function testCosmetic()
    {
        $this->name = __FUNCTION__;
        $this->array = $this->photo()->cosmetic(self::IMAGE, 11);
    }

    /**
     * 人脸变妆
     *
     * @throws TencentAIError
     */
    public function testDecoration()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->decoration(self::IMAGE, 22);
    }

    /**
     * 滤镜 天天 P 图
     *
     * @throws TencentAIError
     */
    public function testFilter()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->filter(self::IMAGE, 32);
    }

    /**
     * 滤镜 AILAB
     *
     * @throws TencentAIError
     */
    public function testAiLabFilter()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->aiLabFilter(self::IMAGE, 65, 1);
    }

    /**
     * 人脸融合
     *
     * @throws TencentAIError
     */
    public function testMerge()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->merge(self::IMAGE, 8);
    }

    /**
     * 大头贴
     *
     * @throws TencentAIError
     */
    public function testSticker()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->sticker(self::IMAGE, 21);
    }

    /**
     * 颜龄检测
     *
     * @throws TencentAIError
     */
    public function testAge()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->photo()->age(self::IMAGE);
    }


    /**
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));

        file_put_contents(self::OUTPUT.$this->name.'.jpg', base64_decode($this->array['data']['image']));
    }

}