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
     * 身份证识别
     *
     * @param  string $image
     * @param  int    $type 身份证图片类型，0-正面，1-反面
     * @return array
     * @link   https://ai.qq.com/doc/ocridcardocr.shtml
     *
     * @throws TencentAIError
     */
    public function idCard(string $image, int $type = 0)
    {
        $this->checkType($type);
        $data = [
            'image' => self::encode($image),
            'card_type' => $type,
        ];
        $url = self::ID_CARD;

        return TencentAI::exec($url, $data);
    }

    /**
     * 名片识别
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/ocrbcocr.shtml
     *
     * @throws TencentAIError
     */
    public function businessCard(string $image)
    {
        $url = self::BUSINESS_CARD;
        return $this->image($url, $image);
    }

    /**
     * 行驶证驾驶证识别
     *
     * @param  string $image
     * @param  int    $type 识别类型，0-行驶证识别，1-驾驶证识别
     * @return array
     * @link   https://ai.qq.com/doc/ocrdriverlicenseocr.shtml
     *
     * @throws TencentAIError
     */
    public function driverLicense(string $image, int $type = 0)
    {
        $this->checkType($type);
        $data = [
            'image' => self::encode($image),
            'type' => $type,
        ];
        $url = self::DRIVE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 营业执照识别
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/ocrbizlicenseocr.shtml
     *
     * @throws TencentAIError
     */
    public function bizLicense(string $image)
    {
        $url = self::BIZ;
        return $this->image($url, $image);
    }

    /**
     * 银行卡识别
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/ocrcreditcardocr.shtml
     *
     * @throws TencentAIError
     */
    public function creditCard(string $image)
    {
        $url = self::CREDIT_CARD;
        return $this->image($url, $image);
    }

    /**
     * 通用识别
     *
     * @param  string $image
     * @return mixed
     * @link   https://ai.qq.com/doc/ocrgeneralocr.shtml
     *
     * @throws TencentAIError
     */
    public function general(string $image)
    {
        $url = self::GENERAL;
        return $this->image($url, $image);
    }
}
