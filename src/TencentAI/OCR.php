<?php

declare(strict_types=1);

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class OCR
{
    use Module\Image;
    use Module\OCR;

    const  BASE_URL = 'https://api.ai.qq.com/fcgi-bin/ocr/';

    const ID_CARD = self::BASE_URL.'ocr_idcardocr';

    const BUSINESS_CARD = self::BASE_URL.'ocr_bcocr';

    const DRIVE = self::BASE_URL.'ocr_driverlicenseocr';

    const BIZ = self::BASE_URL.'ocr_bizlicenseocr';

    const CREDIT_CARD = self::BASE_URL.'ocr_creditcardocr';

    const GENERAL = self::BASE_URL.'ocr_generalocr';

    /**
     * 身份证识别.
     *
     * @param string|\SplFileInfo $image 支持 JPG、PNG、BMP 格式
     * @param bool                $front 正面为 true
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/ocridcardocr.shtml
     */
    public function idCard($image, bool $front = true)
    {
        $data = [
            'image' => self::encode($image),
            'card_type' => (int) !$front,
        ];
        $url = self::ID_CARD;

        return Request::exec($url, $data);
    }

    /**
     * 名片识别.
     *
     * @param mixed $image 支持 JPG、PNG、BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/ocrbcocr.shtml
     */
    public function businessCard($image)
    {
        $url = self::BUSINESS_CARD;

        return $this->image($url, $image);
    }

    /**
     * 行驶证驾驶证识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     * @param int   $type  识别类型，0-行驶证识别，1-驾驶证识别
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @see   https://ai.qq.com/doc/ocrdriverlicenseocr.shtml
     */
    private function driver($image, int $type = 0)
    {
        $data = [
            'image' => self::encode($image),
            'type' => $type,
        ];
        $url = self::DRIVE;

        return Request::exec($url, $data);
    }

    /**
     * 驾驶证识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function driverLicense($image)
    {
        return $this->driver($image, 1);
    }

    /**
     * 行驶证识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public function drivingLicense($image)
    {
        return $this->driver($image);
    }

    /**
     * 营业执照识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/ocrbizlicenseocr.shtml
     */
    public function bizLicense($image)
    {
        $url = self::BIZ;

        return $this->image($url, $image);
    }

    /**
     * 银行卡识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/ocrcreditcardocr.shtml
     */
    public function creditCard($image)
    {
        $url = self::CREDIT_CARD;

        return $this->image($url, $image);
    }

    /**
     * 通用识别.
     *
     * @param mixed $image 支持 JPG PNG BMP 格式
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @see   https://ai.qq.com/doc/ocrgeneralocr.shtml
     */
    public function general($image)
    {
        $url = self::GENERAL;

        return $this->image($url, $image);
    }
}
