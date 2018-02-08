<?php

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
     * @param  string $image
     * @param  bool   $front 正面为 true
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/ocridcardocr.shtml
     */
    public function idCard(string $image, bool $front = true)
    {
        $data = [
            'image' => self::encode($image),
            'card_type' => (int) !$front,
        ];
        $url = self::ID_CARD;

        return TencentAI::exec($url, $data);
    }

    /**
     * 名片识别.
     *
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/ocrbcocr.shtml
     */
    public function businessCard(string $image)
    {
        $url = self::BUSINESS_CARD;

        return $this->image($url, $image);
    }

    /**
     * 行驶证驾驶证识别.
     *
     * @param  string $image
     * @param  bool   $driver 驾驶证为 true
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/ocrdriverlicenseocr.shtml
     */
    public function driverLicense(string $image, bool $driver = true)
    {
        $data = [
            'image' => self::encode($image),
            'type' => (int) $driver,
        ];
        $url = self::DRIVE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 营业执照识别.
     *
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/ocrbizlicenseocr.shtml
     */
    public function bizLicense(string $image)
    {
        $url = self::BIZ;

        return $this->image($url, $image);
    }

    /**
     * 银行卡识别.
     *
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/ocrcreditcardocr.shtml
     */
    public function creditCard(string $image)
    {
        $url = self::CREDIT_CARD;

        return $this->image($url, $image);
    }

    /**
     * 通用识别.
     *
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/ocrgeneralocr.shtml
     */
    public function general(string $image)
    {
        $url = self::GENERAL;

        return $this->image($url, $image);
    }
}
