<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class OCR
{
    use Module\Image;

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
     * @param string $file_path
     * @param int    $type 身份证图片类型，0-正面，1-反面
     * @return array
     * @throws TencentAIError
     */
    public function idCard(string $file_path, int $type = 0)
    {
        if ($type !== 0 && $type !== 1) {
            throw new TencentAIError(90010);
        }
        $data = [
            'image' => base64_encode(file_get_contents($file_path)),
            'card_type' => $type,
        ];

        $url = self::ID_CARD;

        return TencentAI::exec($url, $data);
    }

    /**
     * 名片识别
     *
     * @param string $image
     * @return mixed
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
     * @param string $image
     * @param int    $type 识别类型，0-行驶证识别，1-驾驶证识别
     * @return array
     * @throws TencentAIError
     */
    public function driverLicense(string $image, int $type = 0)
    {
        if ($type !== 0 && $type !== 1) {
            throw new TencentAIError(90011);
        }
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'type' => $type,
        ];
        $url = self::DRIVE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 营业执照识别
     *
     * @param string $image
     * @return mixed
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
     * @param string $image
     * @return mixed
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
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function general(string $image)
    {
        $url = self::GENERAL;

        return $this->image($url, $image);
    }
}
