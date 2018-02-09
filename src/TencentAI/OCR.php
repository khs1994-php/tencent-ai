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
     * @param  int    $type 识别类型，0-行驶证识别，1-驾驶证识别
     *
     * @throws TencentAIError
     *
     * @return array
     *
     * @link   https://ai.qq.com/doc/ocrdriverlicenseocr.shtml
     */
    private function driver(string $image, int $type = 0)
    {
        $data = [
            'image' => self::encode($image),
            'type' => $type,
        ];
        $url = self::DRIVE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 驾驶证识别.
     *
     * @param $image
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
     * @param $image
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
