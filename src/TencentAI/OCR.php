<?php

namespace TencentAI;

class OCR
{
    use Module\Image;

    const  BASE_URL = 'https://api.ai.qq.com/fcgi-bin/ocr/';

    // 身份证识别

    public function idCard(string $file_path, int $card_type = 0)
    {
        $data = [
            'image' => base64_encode(file_get_contents($file_path)),
            'card_type' => $card_type,
        ];

        $url = self::BASE_URL.'ocr_idcardocr';

        return TencentAI::exec($url, $data);
    }

    // 名片识别

    public function bc(string $image)
    {
        $url = self::BASE_URL.'ocr_bcocr';

        return $this->image($url, $image);
    }

    // 行驶证驾驶证识别

    public function driverLicense(string $image, int $type = 0)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'type' => $type,
        ];
        $url = self::BASE_URL.'ocr_driverlicenseocr';

        return TencentAI::exec($url, $data);
    }

    // 营业执照识别

    public function bizLicense(string $image)
    {
        $url = self::BASE_URL.'ocr_bizlicenseocr';

        return $this->image($url, $image);
    }

    // 银行卡识别

    public function creditCard(string $image)
    {
        $url = self::BASE_URL.'ocr_creditcardocr';

        return $this->image($url, $image);
    }

    // 通用识别

    public function general(string $image)
    {
        $url = self::BASE_URL.'ocr_generalocr';

        return $this->image($url, $image);
    }
}
